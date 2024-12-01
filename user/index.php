<?php
    include 'config.php';
    $cat = 1;
    $res=mysqli_query($con,"select * from items where sold='0'");
    if(isset($_POST['cat'])){
        $cat = $_POST['cat'];
        $stmt = "select * from items where sold='0' and cat='$cat'";
        $res=mysqli_query($con,$stmt);
        echo $stmt;
    }
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
</head>

<body style="background: url(&quot;assets/img/login-bg.jpg&quot;) no-repeat;background-repeat: no-repeat; background-size: cover;">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav" style="background: rgba(255,255,255,0.69);">
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
    
    <div class="row product-list" style="margin-top: 100px;margin-right: 5px;margin-left: 5px;">
    <label for="cars">Choose a Category:</label>
    <form action="" method="post">
    <select name="cat" id="cat" onchange='submit()'>
    <option value="*">Any</option>
    <?php
        $res2=mysqli_query($con,"select distinct cat from items");
        while($row=mysqli_fetch_array($res2))
        { ?>
        <option value="<?php echo $row['cat']; ?>"><?php echo $row['cat']; ?></option>
    <?php
        } ?>
    </select>
    </form>
        <?php
           
            
            while($row=mysqli_fetch_array($res))
            {
            
            echo '
            
            <div class="col-sm-6 col-md-4 product-item">
            <div class="product-container">
                <div class="row">
                    <div class="col-md-12"><a class="product-image" href="#"><img src="upload/'.$row['image'].'" ></a></div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <h2><a href="#">'.$row['item'].'</a></h2>
                        Refurbished : '.$row['refurbished'].'
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="product-description">'.$row['description'].' </p>
                        <div class="row">
                            <div class="col-6">';?> 
                            <a href="buy-item.php?itemname=<?php echo $row['item'];?>&&price=<?php echo $row['price'];?>&&id=<?php echo $row['id'];?>"><button class="btn btn-light" type="button">Buy Now!</button></a>
                            <br></div>
                            <div class="col-6">
                                <?php echo'
                                <p class="product-price">'.$row['price'].'</p>' ;
            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php
            }
        ?>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Animated-Text-Background.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="assets/js/Navbar-Custom.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script>
        function submit() {
            let form = document.getElementById("form");
            form.submit();
            alert("Data stored in database!");
        }
    </script>
</body>

</html>