<?php
    include 'config.php';
    $mail =  $_SESSION['email'];
    $_SESSION['buyid'] = $_GET['id'];
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
    <link rel="stylesheet" href="assets/css/cardcss.css">
    <?php
    
  if(isset($_POST['buy'])){

    $mail =  $_SESSION['email'];
    $cardname = trim($_POST['cardname']);
    $_SESSION['cardname'] = $cardname;
    $itemname = $_GET['itemname'];
    $price = $_GET['price'];
    $itemid = $_GET['id'];
    $query=mysqli_query($con, "update items set sold='1',buyermail='$mail' where ID='$buyid'");
    if ($query) {
        $tax = $price * 0.18 ;
        $platform = 100;
        $data = 'name='.$cardname.'&&price='.$price.'&&tax='.$tax.'&&platform='.$platform.'&&itemname='.$itemname.'&&itemid='.$itemid ;
        $url = 'invoice.php?'.$data ;
        echo "<script>alert('Buy Succefull');</script>";
        header('Location:'.$url);
    }
    else
    {
        echo "<script>alert('Something went wrong. Please try againn.');</script>";
    }
  }
?>
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

    <div class="row" style="margin-top: 150px;">
  <div class="col-75">
    <div class="container" style="max-width: 500px;">
    <form action="" method="post" >
        <div class="row">
          <div class="col-30">
            <h3>Billing Address</h3>
            
          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <button type="submit" value="checkout" name="buy" class="btn">Pay</button>
      </form>


    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Animated-Text-Background.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="assets/js/Navbar-Custom.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
</body>

</html>