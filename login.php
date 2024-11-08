<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from users where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['rtomsuid']=$ret['ID'];
     header('location:index.php');
    }
    else{
  
    echo "<script>alert('Invalid Details.');</script>";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>RTO Management System | Login Page</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
	
<body>
<!-- header -->
	<?php include_once('includes/header.php');?>
<!-- //header -->
<!-- banner1 -->
	<div class="banner1">
		<div class="container">
		</div>
	</div>

	<div class="services-breadcrumb">
		<div class="container">
			<ul>
				<li><a href="index.php">Home</a><i>|</i></li>
				<li>Login Page</li>
			</ul>
		</div>
	</div>
<!-- //banner1 -->

<!-- login -->
	<div class="login">
		<div class="container">
			<h6>Login</h6>
			<h3>Welcome to our RTOMS.Please enter your 
				<a href="login.php">Login</a> details to login here. Or <a href="sign-up.php">
				Register</a> here.</h3>

			<form action="#" method="post">
				<input type="text" name="emailcont" required="true" placeholder="Registered Email or Contact Number" required="true">
				<input type="password" name="password" placeholder="Enter password" required="true" class="lock">
				<div class="remember">
					 
					 <div class="w3agile_forgot">
						<h4><a href="forgot-password.php">Forgot Password?</a></h4>
					 </div>
					<div class="clearfix"> </div>
				</div>
				<input type="submit" value="Login" name="login">
			</form>
				
			<div class="agile_back_home">
				<a href="index.php">back to home</a>
			</div>
		</div>
	</div>
<!-- //login -->
<!-- footer -->
	<?php include_once('includes/footer.php');?>
<!-- //footer -->
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>