<?php
include('includes/config.php');
if(!empty($_POST["state_id"])) 
{
 $id=intval($_POST['state_id']);
$query=mysqli_query($con,"SELECT *  FROM tblcity WHERE StateID=$id");
?>
<option value="">Select City</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['ID']); ?>"><?php echo htmlentities($row['CityName']); ?></option>
  <?php
 }
}
?>