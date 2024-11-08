<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if($_GET['del']){
$cityid=$_GET['id'];
mysqli_query($con,"delete from tblcity where ID ='$cityid'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='manage-city.php'</script>";
          }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>RTO Management System || Manage RTO</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
 <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
       <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage RTO</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage City</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               RTO Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name of RTO</th>
                                            <th>Name of Officer</th>
                                            <th>State Name</th>
                                            <th>City Name</th>
                                            <th>Creation date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th>Name of RTO</th>
                                            <th>Name of Officer</th>
                                            <th>State Name</th>
                                            <th>City Name</th>
                                            <th>Creation date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"select tblstate.StateName,tblstate.ID as sid,tblcity.ID as cid,tblcity.CityName,tblcity.StateID,tblcity.CreationDate as ccd,tblrto.ID as rid,tblrto.StateID,tblrto.CityID,tblrto.NameofRTO,tblrto.RTOAddress,tblrto.Nodalofficer, tblrto.Username,Nodalofficer, tblrto.CreationDate as rcd from tblrto left join tblstate on tblstate.ID=tblrto.StateID left join tblcity on tblcity.ID=tblrto.CityID");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>  

                                <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['NameofRTO']);?></td>
                                            <td><?php echo htmlentities($row['Nodalofficer']);?></td>
                                            <td><?php echo htmlentities($row['StateName']);?></td>
                                           <td><?php echo htmlentities($row['CityName']);?></td>
                                            <td> <?php echo htmlentities($row['rcd']);?></td>
                                           
                                            <td>
                                            <a href="edit-rto.php?id=<?php echo $row['rid']?>"><i class="fas fa-edit"></i></a> | 
                                            <a href="manage-rto.php?id=<?php echo $row['rid']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>