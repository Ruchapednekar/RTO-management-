<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from users where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo '<script>alert("This email or Contact Number already associated with another account")</script>';
    }
    else{
    $query=mysqli_query($con, "insert into users(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
    if ($query) {
    
    echo '<script>alert("You have successfully registered")</script>';
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>RTO Management System | Sign Up</title>
<!-- for-mobile-apps -->

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
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 
</script>
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
				<li>Sign Up Page</li>
			</ul>
		</div>
	</div>
<!-- //banner1 -->

<!-- sign-up -->
	<div class="login">
		<div class="container">
			<h6>Sign Up</h6>
			<h3>Welcome to our Truckage.Please enter your <a href="sign-up.php">Registration </a>details. Or have an account <a href="login.php">Login</a> here </h3>

			<form method="post" name="signup" onsubmit="return checkpass();">
				<div><input type="text" name="firstname"  required="true" placeholder="Your First Name...">
				</div>

				<div style="margin-top:2%;">
				<input type="text" name="lastname" placeholder="Your Last Name..." required="true" >
				</div>

					<div style="margin-top:2%;">
				<input type="text" name="mobilenumber" maxlength="10" pattern="[0-9]{10}" placeholder="Mobile Number" required="true"></div>
				<input type="email" name="email" placeholder="Email address" required="true">
				<input type="password" name="password" placeholder="Enter password" required="true" class="lock">
				<input type="password" name="repeatpassword" placeholder="Enter repeat password" required="true" class="lock">
				
				<div class="remember">
					<label class="checkbox"><input type="checkbox" name="Checkbox" checked=""><i> </i>I Accept Terms</label>
				</div>
				<input type="submit" name="submit" value="Sign Up">
			</form>

			<div class="agile_back_home">
				<a href="index.php">Back to home</a>
			</div>
		</div>
	</div>
<!-- //sign-up -->
<!-- footer -->
	<?php include_once('includes/footer.php');?>
<!-- //footer -->
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>