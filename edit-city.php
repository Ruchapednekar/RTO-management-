<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$stateid=$_POST['stateid'];
$cityname=$_POST['cityname'];
$id=intval($_GET['id']);
$sql=mysqli_query($con,"update tblcity set StateID='$stateid', CityName='$cityname' where ID='$id'");
echo "<script>alert('City Details updated');</script>";
echo "<script>window.location.href='manage-city.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>RTO Management System || Update City</title>
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
                        <h1 class="mt-4">Edit City</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit City</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select tblstate.StateName,tblstate.ID as sid,tblcity.ID as cid,tblcity.CityName,tblcity.StateID,tblcity.CreationDate as ccd from tblcity join tblstate on tblstate.ID=tblcity.StateID where tblcity.ID='$id'");
while($row=mysqli_fetch_array($query))
{
?>	                            	
<form  method="post">                                
<div class="row">
<div class="col-2">State Name</div>
<div class="col-4">
<select name="stateid" class="form-control" required>
<option value="<?php echo  htmlentities($row['StateName']);?>"><?php echo  htmlentities($row['StateName']);?></option> 
<?php $query1=mysqli_query($con,"select * from tblstate");
while($row1=mysqli_fetch_array($query1))
{?>
<option value="<?php echo $row1['ID'];?>"><?php echo $row1['StateName'];?></option>
<?php } ?>
</select>    
</div>
</div>

<br>
<div class="row">
<div class="col-2">City Name</div>
<div class="col-4"><input type="text" value="<?php echo  htmlentities($row['CityName']);?>"  name="cityname" class="form-control" required></div>
</div>

<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Update</button></div>
</div>

</form>
<?php } ?>
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