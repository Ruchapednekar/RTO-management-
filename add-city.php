<?php session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$stateid=$_POST['stateid'];
$cityname=$_POST['cityname'];
$sql=mysqli_query($con,"insert into tblcity(StateID,CityName) values('$stateid','$cityname')");
echo "<script>alert('City added successfully');</script>";
echo "<script>window.location.href='add-city.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>RTO Management System - Add City</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add City</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add City</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post">
<div class="row">
<div class="col-2">State Name</div>
<div class="col-4">
<select name="stateid" class="form-control" required>
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
<div class="col-4"><input type="text" placeholder="Enter City Name"  name="cityname" class="form-control" required></div>
</div>
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