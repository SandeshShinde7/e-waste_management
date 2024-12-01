<?php
    include 'config.php';
    $mail =  $_SESSION['email'];
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

<body style="background: url(&quot;assets/img/login-bg.jpg&quot;);">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav" style="background: rgba(255,255,255,0.59);">
        <div class="container"><a class="navbar-brand" href="index.php">E-Waste Management</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        Hi, <?php echo $mail ?>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Buy Items</a></li>
                    <li class="nav-item"><a class="nav-link" href="sell.php">Sell Items</a></li>
                    <li class="nav-item"><a class="nav-link" href="myitems.php">My Items<br></a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row product-list" style="margin-top: 100px;margin-right: 5px;margin-left: 5px;">
        <?php
            
            $res=mysqli_query($con,"select * from items where email='".$mail."';");
            
            while($row=mysqli_fetch_array($res))
            {
            echo '
            <div class="col-sm-6 col-md-4 product-item">
            <div class="product-container">
                <div class="row">
                    <div class="col-md-12"><a class="product-image" href="#"><img src="upload/'.$row['image'].'" ></a></div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <h2>'.$row['item'].'</a> </h2>
                        Rs :'.$row['price'].'
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="product-description">'.$row['description'].'  </p>
                        <div class="row">
                            <div class="col-6"> '.$row['refurbished'].' <br> Sold To: '; ?> <?php if($row['sold'] == 1){ echo $row['buyermail']; } else{ echo "No One" ;} echo ' </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
            ' ;
            ?><?php
            }
        ?>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Animated-Text-Background.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="assets/js/Navbar-Custom.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>