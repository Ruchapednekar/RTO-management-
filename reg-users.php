<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>RTO Management System- User Details</title>
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
                        <h1 class="mt-4">User Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Details</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               User Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                  <th>S.NO</th>
                  <th>Name</th>
                  <th>Mobile Number</th>
                   <th>Email</th>
                  <th>Reg Date</th>
                  <th>Action</th>
                  
                </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                  <th>S.NO</th>
                  <th>Name</th>
                  <th>Mobile Number</th>
                   <th>Email</th>
                  <th>Reg Date</th>
                  <th>Action</th>
                  
                </tr>
                                    </tfoot>
                                    <tbody>
<?php
$ret=mysqli_query($con,"select * from users");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 

                                <tr class="gradeX">
                  <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                  <td><?php  echo $row['MobileNumber'];?></td>
                  <td><?php  echo $row['Email'];?></td>
                  <td><?php  echo $row['regDate'];?></td>
                  <td>
                      <a href="user-llreuests.php?uid=<?php  echo $row['id'];?>&&uname=<?php  echo $row['FirstName'];?>" class="btn btn-warning">LL Requests</a>
        <a href="user-dlreuests.php?uid=<?php  echo $row['id'];?>&&uname=<?php  echo $row['FirstName'];?>" class="btn btn-primary">DL Requests</a>

                  </td>
                </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>
                
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>