
<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['rtomsuid']==0)) {
  header('location:logout.php');
  } else{
     if(isset($_POST['submit']))
  {
    $uid=$_SESSION['rtomsuid'];
    $stateid=$_POST['state'];
$cityid=$_POST['city'];
   
  $fathersname=$_POST['fathersname'];
  $dob=$_POST['dob'];
  $qualification=$_POST['qualification'];
 
  $licencetype=$_POST['licencetype'];
  $peradd=$_POST['peradd'];
  $commadd=$_POST['commadd'];
  $bloodgroup=$_POST['bloodgroup'];
  $applicationnum=mt_rand(100000000, 999999999);
  $photo=$_FILES["photo"]["name"];
 $extension = substr($photo,strlen($photo)-4,strlen($photo));
 $allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('photo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$photo=md5($photo).time().$extension;
 move_uploaded_file($_FILES["photo"]["tmp_name"],"llimages/".$photo);
 $query=mysqli_query($con,"insert into tblllicence(ApplicationNumber,UserID,StateID,CityID,ProfilePic,FathersName,DateofBirth,EducationQualification,LicenceType,PermanentAddress,CommunicationAddress,BloodGroup) value('$applicationnum','$uid','$stateid','$cityid','$photo','$fathersname','$dob','$qualification','$licencetype','$peradd','$commadd','$bloodgroup')");
    if ($query) {
$ret=mysqli_query($con,"select ApplicationNumber from tblllicence where UserID='$uid'");
$result=mysqli_fetch_array($ret);
$_SESSION['appno']=$result['ApplicationNumber'];
 echo "<script>window.location.href='thank-you.php'</script>";  
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
    }

  
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>RTO Management System || Learning License</title>

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
<script>
function getcity(val1) {
  $.ajax({
type:"POST",
url:"get_city.php",
data:'$stateid='+val1,
success:function(data){
$("#city").html(data);
}

  });
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
				<li>Learing License</li>
			</ul>
		</div>
	</div>
<!-- //banner1 -->

<!-- mail -->
	<div class="mail">
		<div class="container">
			<h3>Learning License</h3>
			<p class="quia">Fill The Form For Learning Licence</p>
			
			<div class="col-md-12 wthree_contact_left">
				<h4>Learing License</h4>
				<form action="#" method="post" enctype="multipart/form-data">
					<div class="col-md-6 wthree_contact_left_grid">
						
						<label style="padding-top: 20px;">Photo</label>
						<input type="file" name="photo" required="">
						<br>
						<label style="padding-top: 20px;">Father's Name</label>
						<input type="text" name="fathersname" placeholder="Father's Name*" required="">
		<label style="padding-top: 20px;">Date of Birth<smalln style="color:red;">(Select DOB Before 2005-01-01)</small></label><br />
						<input type="date" name="dob" placeholder="Date of Birth*" required="" max="2005-01-01"><br />
						<label style="padding-top: 20px;">Education Qualification</label>
						<input type="text" name="qualification" placeholder="Education Qualification*" required="">
						<label style="padding-top: 20px;">Licence Type</label><br />
						<select name="licencetype" required>
							<option value="">Choose Licence Type</option>
							<option value="Two Wheeler">Two Wheeler</option>
							<option value="Three/Four Wheeler">Three/Four Wheeler</option>
							<option value="Heavy Motor Vehicle">Heavy Motor Vehicle</option>
						</select>
						<hr>
						<label>Blood Group</label>
						<input type="text" name="bloodgroup" placeholder="Blood Group*">
						<br>
						
					</div>
					<div class="col-md-6 wthree_contact_left_grid">
						<label style="padding-top: 20px;">State</label>
						<select name="state"  required="true" onChange="getcity(this.value)" id="state">
<option value="">Select State</option> 
<?php $query=mysqli_query($con,"select * from tblstate");
while($row=mysqli_fetch_array($query))
{?>
<option value="<?php echo $row['ID'];?>"><?php echo $row['StateName'];?></option>
<?php } ?>
</select>

						<label style="padding-top: 20px;">City</label>
						<select   name="city"  id="city" required="true">
        <option value="">Select City</option></select>
        <br>
						<label>Permanent Address</label>
						<textarea type="text" name="peradd" placeholder="Permanent Address*" required="" rows="4"></textarea>
						<label>Communication Address</label>
						<textarea type="text" name="commadd" placeholder="Communication Address*" required=""></textarea>
						
					</div>
					<hr>
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