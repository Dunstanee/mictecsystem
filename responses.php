<?php
include "includes/header.php";
if (isset ($_REQUEST['id']))
{

	$del=mysqli_query($conn,"DELETE FROM course WHERE id=".$_REQUEST['id']);
	if($del)
	{


		echo "<script>alert('Course Deleted successful!!');
		</script>";
	}
}
 ?>
 <style>
 .courseview{
   margin-left: 24%;
   margin-top: 3%;
 }
 #customers {
   font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
   border-collapse: collapse;
   width: 100%;
 }

 #customers td, #customers th {
   border: 1px solid #ddd;
   padding: 8px;
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
    <th>SEND NAME</th>
    <th>SUBJECT</th>
    <th>MESSAGE</th>
    <th>EMAIL</th>
    <th>DATE</th>
    <th>ACTION</th>
  </tr>
</tr>
<?php
$qury=mysqli_query($conn,"SELECT * FROM messages");
$i=1;
while($rw=mysqli_fetch_array($qury))
{
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $rw["name"];?></td>
<td><?php echo $rw["subject"];?></td>
<td><?php echo $rw["message"];?></td>
<td><?php echo $rw["email"];?></td>
<td><?php echo $rw["date"];?></td>
<td>
<button style="background-color: red; width:50px;"><a style="text-decoration:none; color:white;"  onclick="javascript: return confirm('Are you sure you want to Delete user!!?');" href="?pg=us&id=<?php echo $rw["id"]; ?>">Delete</a></button>
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
