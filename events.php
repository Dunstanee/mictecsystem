<?php
include "includes/header.php";
if (isset ($_REQUEST['id']))
{

	$del=mysqli_query($conn,"DELETE FROM activity WHERE id=".$_REQUEST['id']);
	if($del)
	{
		echo "<script>alert('Event Deleted successful!!');
		</script>";
	}
}
 ?>
 <style>
 .courseview{

   margin-top: 3%;
 }
 #customers {
   font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
   border-collapse: collapse;
   width: 100%;
 }

 #customers td, #customers th {
   border: 1px solid #ddd;
   padding: 6px;
 }

 #customers tr:nth-child(even){background-color: #f2f2f2;}

 #customers tr:hover {background-color: #ddd;}

 #customers th {
   padding-top: 12px;
   padding-bottom: 12px;
   text-align: left;
   background-color: red;
   color: white;
 }
 </style>
 <div class="courseview">


 <table id="customers">
  <tr>
    <th>S/N</th>
    <th>EVENT NAME</th>
    <th>DESCRIPTION</th>
    <th>AMOUNT PAYABLE</th>
    <th>END DATE</th>
    <th>DATE ENTERED</th>
		<?php if ($_SESSION["POSITION"] == "Organizing Secretary" or $_SESSION["LEVEL"]=="Admin"  )
		{
		 ?>
    <th>ACTION</th>
	<?php } else {
		?>
<th>STATUS</th>
		<?php
	} ?>
  </tr>
</tr>
<?php
$qury=mysqli_query($conn,"SELECT * FROM activity");
$i=1;
while($rw=mysqli_fetch_array($qury))
{
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $rw["acti_name"];?></td>
<td><?php echo $rw["description"];?></td>
<td><?php echo $rw["Amount_to_pay"];?></td>
<td><?php echo $rw["date_end"];?></td>
<td><?php echo $rw["date"];?></td>
<?php if ($_SESSION["POSITION"] == "Organizing Secretary" or  $_SESSION["LEVEL"]=="Admin"  )
{
 ?>


<td>

  <button style="background-color: orange; width:50px;"><a style="text-decoration:none; color:white;" href="edit_events.php?pg=ev&id=<?php echo $rw["id"];?>">Edit</a></button>    <br>
  <button style="background-color: red; width:50px;"><a style="text-decoration:none; color:white;"  onclick="javascript: return confirm('Are you sure you want to Delete user!!?');" href="?pg=evs&id=<?php echo $rw["id"]; ?>">Delete</a></button>
<?php } else {
	?>
<td>

	<?php
	$dt = date("Y-m-d");
if ($rw["date_end"]>$dt) {
echo "OPEN";
}else {
echo "CLOSED";
}
?>
</td>
<?php
}

?>
</tr>


	<?php
	$i++;
}
?>
</table>

</div>
 <?php
 include "includes/footer.php";
  ?>
