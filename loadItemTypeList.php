<?php
header('Access-Control-Allow-Origin: *'); 
?>
<?php
include('db.php');
$sql="SELECT * FROM item_type WHERE status = 1";
$result = $conn->query($sql);

 while ($row=mysqli_fetch_assoc($result))
    {
?>
   		<option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option>
<?php 
}
?>
 