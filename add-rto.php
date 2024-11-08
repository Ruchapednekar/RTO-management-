<?php session_start();
//error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$stateid=$_POST['state'];
$cityid=$_POST['city'];
$rtoname=$_POST['rtoname'];
$rtoadd=$_POST['rtoadd'];
$nofficer=$_POST['nofficer'];
$username=$_POST['username'];
$password=md5($_POST['password']);

$sql=mysqli_query($con,"insert into tblrto(StateID,CityID,NameofRTO,RTOAddress,Nodalofficer,Username,Password) values('$stateid','$cityid','$rtoname','$rtoadd','$nofficer','$username','$password')");
echo "<script>alert('RTO added successfully');</script>";
echo "<script>window.location.href='add-rto.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>RTO Management System - Add RTO</title>
        <link href="css/styles.css" rel="stylesheet" />
          <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.min.js"></script>

<script>
function getCity(val) {
    //alert(val);
    $.ajax({
    type: "POST",
    url: "get_city.php",
    data:'state_id='+val,
    success: function(data){
        $("#city").html(data);
    }
    });
}
</script>





    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add RTO</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add RTO</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post">
    <div class="row">
<div class="col-2">Name of RTO</div>
<div class="col-4"><input type="text" placeholder="Name of RTO"  name="rtoname" class="form-control" required></div>
</div><br>
<div class="row">
<div class="col-2">Name of Nodal Officer</div>
<div class="col-4"><input type="text" placeholder="Name of RTO Officer"  name="nofficer" class="form-control" required></div>
</div><br>

<div class="row">
<div class="col-2">Address of RTO</div>
<div class="col-4"><textarea type="text" placeholder="Address of RTO"  name="rtoadd" class="form-control" required></textarea></div>
</div>
<br>
<div class="row">
<div class="col-2">State Name</div>
<div class="col-4">
<select onChange="getCity(this.value);" name="state" class="form-control" required="true"  id="state" >
<option value="">Select State</option> 
<?php $query=mysqli_query($con,"select * from tblstate");
while($row=mysqli_fetch_array($query))
{?>
<option value="<?php echo $row['ID'];?>"><?php echo $row['StateName'];?></option>
<?php } ?>
</select>    
</div>
</div>
<br>
<div class="row">
<div class="col-2">City Name</div>
<div class="col-4">
    <select  name="city"  id="city" class="form-control" required>
    
</select>
</div>
</div><br>
<div class="row">
<div class="col-2">Username</div>
<div class="col-4"><input type="text" placeholder="Username"  name="username" class="form-control" required></div>
</div><br>
<div class="row">
<div class="col-2">Password</div>
<div class="col-4"><input type="password" name="password" placeholder="Enter password" required="true" class="form-control"></div>
</div><br>
<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
</div>

</form>
                            </div>
                        </div>
                    </div>
                </main>
          <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>