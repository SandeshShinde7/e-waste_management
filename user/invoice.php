<?php
    include 'config.php';
	$itemname = $_GET['itemname'];
	$itemid = $_GET['itemid'];
	$price = $_GET['price'];
	$name = $_GET['name'];
	$tax = $_GET['tax'];
	$platform = $_GET['platform'];
	$mail =  $_SESSION['email'];
	$query=mysqli_query($con, "update items set sold='1',buyermail='$mail' where ID='$itemid'");
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
    <link rel="stylesheet" href="assets/css/invoicecss.css">
    
</head>

<body>
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
    <article>
			<h1>Recipient</h1>
			<address >
				<p>E-Waste Resell & Refurbished</p>
			</address>
			<table class="meta">
				<tr>
					<th><span >Invoice #</span></th>
					<td><span ><?php echo $itemid; ?></span></td>
				</tr>
				<tr>
					<th><span >Date</span></th>
					<td><span ><?php echo date("Y/m/d"); ?></span></td>
				</tr>
				<tr>
					<th><span >Amount Due</span></th>
					<td><span id="prefix" >Rs : </span><span> <?php echo $price+$tax+$platform; ?></span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span >Buyer Name</span></th>
						<th><span >Item</span></th>
						<th><span >Rate</span></th>
						<th><span >Quantity</span></th>
						<th><span >Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a class="cut">-</a><span ><?php echo $name;?></span></td>
						<td><a class="cut">-</a><span ><?php echo $itemname; ?></span></td>
						<td><span data-prefix>₹</span><span ><?php echo $price; ?></span></td>
						<td><span >1</span></td>
						<td><span data-prefix>₹</span><span><?php echo $price; ?></span></td>
					</tr>
				</tbody>
			</table>
			
			<table class="balance">
				<tr>
					<th><span >Total</span></th>
					<td><span data-prefix>₹</span><span><?php echo $price; ?></span></td>
				</tr>
				<tr>
					<th><span >Tax ( 18% )</span></th>
					<td><span data-prefix>₹ </span><span ><?php echo $tax; ?></span></td>
				</tr>
				<tr>
					<th><span >Platform Charges</span></th>
					<td><span data-prefix>₹</span><span ><?php echo $platform; ?></span></td>
				</tr>
				<tr>
					<th><span >Balance Due</span></th>
					<td><span data-prefix>₹</span><span> <?php echo $price+$tax+$platform; ?></span></td>
				</tr>
			</table>
		</article>


    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Animated-Text-Background.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="assets/js/Navbar-Custom.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    
</body>

</html>