<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $item=$_POST['item'];
    $price=$_POST['price'];    
    $description=$_POST['description'];
    $eid=$_GET['manageid'];

    $filename = $_FILES['image']['name'];
    $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    
    $fid=mt_rand(100000000, 999999999);
    $pic=$_FILES["image"]["name"];
    $extension = substr($pic,strlen($pic)-4,strlen($pic));
    // allowed extensions
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if(!in_array($extension,$allowed_extensions))
    {
    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }
    else
    {
                
    $itempic=md5($pic.time()).$extension;
    move_uploaded_file($_FILES["image"]["tmp_name"],"../user/upload/".$itempic);
    $stmt = "update items set item='$item', price='$price', description='$description', refurbished='Refurbished By Seller', image='$itempic' where id='$eid'";
    $query=mysqli_query($con, $stmt);
    if ($query) {

      
    echo '<script>alert("Item has been Updated")</script>';
    echo '<script>alert(" '. $stmt .' ")</script>';
    echo "<script>window.location.href ='manage-items.php'</script>";
    }
  
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
    
  }
    
  
}
?>


<!DOCTYPE html>
<head>
<title>E - Waste Management System|| E - Seller Details </title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<?php include_once('includes/header.php');?>
<!--header end-->
<!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Item Refurbish & Price Reset
    </div>
    <div>
      
    <form class="custom-validation"  method="post" enctype='multipart/form-data'>
        <?php
        $mid=$_GET['manageid'];
        $ret=mysqli_query($con,"select * from items where id='$mid'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?> 
        <div class="form-group">
            <label>Item Name</label>
            <input type="text" class="form-control" name="item" value="<?php  echo $row['item'];?>" required='true'>
        </div>

        <div class="form-group">
            <label>Item price</label>
            <input type="text" class="form-control" name="price" value="<?php  echo $row['price'];?>" required='true'>
        </div>
        

        <div class="form-group">
            <label>Item Description</label>
            <div>
              <textarea required='true' class="form-control" rows="5" name="description"><?php  echo $row['description'];?></textarea>
            </div>
            
        </div>

        <div class="form-group">
            <label>Item Image</label>
            <input class="form-control" type="file" name="image" id="file" multiple value="<?php  echo $row['image'];?>">
        </div>


    <?php 
    $cnt=$cnt+1;
    }?>        
  
        <div class="form-group mb-0">
            <div>
                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="submit">
                    Update
                </button>
                
            </div>
        </div>
    </form>    
            
          
    </div>
  </div>
</div>
</section>
 <!-- footer -->
		 <?php include_once('includes/footer.php');?>  
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
<?php }  ?>