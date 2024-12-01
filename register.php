<?php 
include "config.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>E-waste Home Page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <style>
        body{
            overflow-x: hidden;
            white-space: nowrap;
        }
    </style>
    <?php 
        
	// Register user
	if(isset($_POST['register'])){
		$name = trim($_POST['name']);
		$address = trim($_POST['address']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$phone = trim($_POST['phone']);

		// Insert records
			$stmt2 = "insert into users(name,email,phone,address,password) values('$name','$email','$phone','$address','$password')";
            $query2 = mysqli_query($con,$stmt2);
            if($query2){
			$success_message = "Account created successfully.";
            $_SESSION['email'] = $email;
            header('Location: '.'login.php');
            }
            else{
            $error_message = "Account creation failed.";
            }

        
	}
	?>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand" href="index.php">E-Waste Management</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact us</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin/login.php">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image:url('assets/img/reg-bg.jpg'); background-size: cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto position-relative">
                    <section class="login-dark" style="color: rgba(33,37,41,0);background: rgba(71,93,98,0);">
                        <form action="" method="post" style="width: 376px;">
                            <h2 class="visually-hidden">Reg Form</h2>
                            
                            <div class="illustration"><i class="far fa-user"></i></div>
                            <div class="mb-3">
                                <input class="form-control" type="text" name="name" placeholder="Full Name">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" name="email" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="number" name="phone" placeholder="Phone Number">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" name="address" placeholder="Address">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="mb-3"><button  name="register" class="btn btn-primary d-block w-100" type="submit" >Register</button></div>
                            <a class="forgot" href="login.php">Have Account ? Login</a>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </header>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/clean-blog.js"></script>
</body>

</html>