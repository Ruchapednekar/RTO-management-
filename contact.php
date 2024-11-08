<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
     
    $query=mysqli_query($con, "insert into tblcontact(Name,Email,Message) value('$name','$email','$message')");
    if ($query) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE html>
<html>
<head>
<title>RTO Management System | Mail Us</title>

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
				<li>Mail Us</li>
			</ul>
		</div>
	</div>
<!-- //banner1 -->

<!-- mail -->
	<div class="mail">
		<div class="container">
			<h3>Mail Us</h3>
			<?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
			<p class="quia">how to find us</p>


			<div class="col-md-4 wthree_contact_left">
				<h4>Address</h4>
				<p><?php  echo $row['PageDescription'];?></p>
				<ul>
					<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Free Phone :+<?php  echo $row['MobileNumber'];?></li>
					<li><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Timing :<?php  echo $row['Timing'];?></li>
					<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><?php  echo $row['Email'];?></li>
				</ul>
			</div><?php } ?>
			<div class="col-md-8 wthree_contact_left">
				<h4>Contact Form</h4>
				<form method="post">
					 	
                                   	      <label> Full Name</label>
                                          <input type="text" placeholder="Name" required="true" name="name" class="form-control">
                                            <br>
                                          	<label> Email</label>
                                          <input type="email" placeholder="Email" required="true" name="email" class="form-control">
                                           <br>
                                          	<label> Message</label>
                                          <textarea rows="10" placeholder="Your Message" required="true"name="message" class="form-control"></textarea>
                                          <br>
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