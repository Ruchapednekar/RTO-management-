
<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['rtomsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
{
$userid=$_SESSION['rtomsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from users where ID='$userid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update users set Password='$newpassword' where ID='$userid'");

 echo '<script>alert("Your password successully changed")</script>'; 
} else {

 echo '<script>alert("Your current password is wrong")</script>';

}



}
?>
<!DOCTYPE html>
<html>
<head>
<title>RTO Management System || Change Password</title>

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
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
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
				<li>Change Password</li>
			</ul>
		</div>
	</div>
<!-- //banner1 -->

<!-- mail -->
	<div class="mail">
		<div class="container">
			<h3>Change Password</h3>
			<p class="quia">Change Password</p>
			
			<div class="col-md-8 wthree_contact_left">
				<h4>Change Password</h4>
				<form action="#" method="post" name="changepassword" onsubmit="return checkpass();">
					
					<div class="col-md-6 wthree_contact_left_grid">
						
						<label style="padding-top: 20px;">Current Password</label>
						<input type="password" class="form-control" id="currentpassword" name="currentpassword" value="" required="true">
						<br>
						<label style="padding-top: 20px;">New Password</label>
						<input type="password" class="form-control" id="newpassword" name="newpassword" value="" required="true">
						<label style="padding-top: 20px;">Confirm Password</label>
						<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" value=""  required="true">
						
						
					</div>
				
					<div class="clearfix"></div>
				<hr>
					<button class="btn btn-primary" type="submit" name="submit">Submit</button>
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //mail -->
<!-- footer -->
	<?php include_once('includes/footer.php');?>
<!-- //footer -->
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>
<?php } ?>