
<?php 
include "config.php";
$conn = $con;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arbutus+Slab">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Animated-Text-Background.css">
    <link rel="stylesheet" href="assets/css/dropdown-search-bs4.css">
    <link rel="stylesheet" href="assets/css/Neon-Button.css">
    <link rel="stylesheet" href="assets/css/Pretty-Product-List.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <?php 
	$error_message = "";$success_message = "";
    $isValid = false;
	// Register user
	if(isset($_POST['post'])){
		$item = trim($_POST['item']);
		$itemage = trim($_POST['itemage']);
		$price = trim($_POST['price']);
        $qty = trim($_POST['qty']);
		$description = trim($_POST['description']);
        $cat = trim($_POST['cat']);
        $usermail = $_SESSION['email'];
        
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
        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/".$itempic);


		// Check fields are empty or not
		if($item == '' || $itemage == '' || $price == '' || $description == '' ){
			$error_message = "Please fill all fields.";
		}

        $query=mysqli_query($con,"INSERT into items(email,item,itemage,qty,price,description,cat,image,sold,buyermail) values('$usermail','$item','$itemage','$qty','$price','$description','$cat','$itempic','0','none')");
        if ($query) {
            echo "<script>alert('Selling Detail added successfully.');</script>";
          }
          else
            {
             echo "<script>alert('Something went wrong. Please try again.');</script>";
            }
        
        }
        }
	?>
</head>

<body style="background: url(&quot;assets/img/reg-bg.jpg&quot;);">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav" style="background: rgba(255,255,255,0.41);">
        <div class="container"><a class="navbar-brand" href="index.php">E-Waste Management</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Buy Items</a></li>
                    <li class="nav-item"><a class="nav-link" href="sell.php">Sell Items</a></li>
                    <li class="nav-item"><a class="nav-link" href="myitems.php">My Items<br></a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container profile profile-view" id="profile" style="margin-top: 80px;background: rgba(255,255,255,0.44);">
        <div class="row">
            <div class="col-md-12 alert-col relative">
                <div class="alert alert-info alert-dismissible absolue center" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            </div>
        </div>
        <form action="" method="post" enctype='multipart/form-data' >
                        <?php 
					            // Display Error message
                            if(!empty($error_message)){
                            ?>
                                <div class="alert alert-danger">
                                    <strong>Error!</strong> <?= $error_message ?>
                                </div>

                            <?php
                            }
                            ?>

                            <?php 
                            // Display Success message
                            if(!empty($success_message)){
                            ?>
                                <div class="alert alert-success">
                                    <strong>Success!</strong> <?= $success_message ?>
                                </div>

                            <?php
                            }
                            ?>
            <div class="row profile-row">
                <div class="col-md-4 relative">
                    <div class="avatar">
                        <div class="avatar-bg center"></div>
                    </div><input class="form-control form-control" type="file" name="image" id="file" multiple>
                </div>
                <div class="col-md-8">
                    <h1>Item Details</h1>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Item Name</label><input class="form-control" type="text" name="item"></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Used Years</label><input class="form-control" type="text" name="itemage"></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Quantity</label><input class="form-control" type="text" name="qty"></div>
                        </div>
                    </div>
                    <div class="form-group mb-3"><label class="form-label">Description</label><input class="form-control" type="text" autocomplete="off" required="" name="description"></div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Price</label><input class="form-control" type="text" name="price" autocomplete="off" required=""></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Category</label>
                            <select class="form-control" name="cat" id="cat"  required="">
                                <option value="Mobile">Mobile</option>
                                <option value="TV">TV</option>
                                <option value="Computer">Computer</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 content-right"><button class="btn btn-primary form-btn" name="post" type="submit">POST</button><button class="btn btn-danger form-btn" type="reset">CANCEL </button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Animated-Text-Background.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="assets/js/Navbar-Custom.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>