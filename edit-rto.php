<?php session_start();
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
$id=intval($_GET['id']);
$sql=mysqli_query($con,"update tblrto set StateID='$stateid', CityID='$cityid',NameofRTO='$rtoname',RTOAddress='$rtoadd',Nodalofficer='$nofficer' where ID='$id'");
echo "<script>alert('RTO Details updated');</script>";
echo "<script>window.location.href='manage-rto.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>RTO Management System || Update rto</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
           <script>
function getCity(val) {
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
                        <h1 class="mt-4">Edit State</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit State</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select tblstate.StateName,tblstate.ID as sid,tblcity.ID as cid,tblcity.CityName,tblcity.StateID,tblcity.CreationDate as ccd,tblrto.ID as rid,tblrto.StateID,tblrto.CityID,tblrto.NameofRTO,tblrto.RTOAddress,tblrto.Nodalofficer, tblrto.Username,Nodalofficer, tblrto.CreationDate as rcd 
    from tblrto 
    left join tblstate on tblstate.ID=tblrto.StateID 
    left join tblcity on tblcity.ID=tblrto.CityID where tblrto.ID='$id'");
while($row=mysqli_fetch_array($query))
{
?>	                            	
<form  method="post">                                
<div class="row">
<div class="col-2">Name of RTO</div>
<div class="col-4"><input type="text" placeholder="Name of RTO"  name="rtoname" class="form-control" required='true' value="<?php echo  htmlentities($row['NameofRTO']);?>"></div>
</div><br>
<div class="row">
<div class="col-2">Name of Nodal Officer</div>
<div class="col-4"><input type="text" placeholder="Name of RTO Officer"  name="nofficer" class="form-control" required='true' value="<?php echo  htmlentities($row['Nodalofficer']);?>"></div>
</div><br>

<div class="row">
<div class="col-2">Address of RTO</div>
<div class="col-4"><textarea type="text" placeholder="Address of RTO"  name="rtoadd" class="form-control" required><?php echo  htmlentities($row['RTOAddress']);?></textarea></div>
</div>
<br>
<div class="row">
<div class="col-2">State Name</div>
<div class="col-4">
<select name="state" id="state" class="form-control" required="true" onChange="getCity(this.value);">
<option value="<?php echo  htmlentities($row['StateID']);?>"><?php echo  htmlentities($row['StateName']);?></option> 
<?php $query=mysqli_query($con,"select * from tblstate");
while($result=mysqli_fetch_array($query))
{?>
<option value="<?php echo $result['ID'];?>"><?php echo $result['StateName'];?></option>
<?php } ?>
</select>    
</div>
</div>
<br>
<div class="row">
<div class="col-2">City Name</div>
<div class="col-4">
<select   name="city"  id="city" class="form-control" required>
    <option value="<?php echo  htmlentities($row['cid']);?>"><?php echo  htmlentities($row['CityName']);?></option> 
</select>
</div>
</div><br>
<div class="row">
<div class="col-2">Username</div>
<div class="col-4"><input type="text" placeholder="Username"  name="username" class="form-control"  value="<?php echo  htmlentities($row['Username']);?>" readonly title="username can't be edit"></div>
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