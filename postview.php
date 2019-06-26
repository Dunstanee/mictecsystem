<?php
include "includes/header.php";
if (isset ($_REQUEST['id']))
{

	$del=mysqli_query($conn,"DELETE FROM posts WHERE id=".$_REQUEST['id']);
	if($del)
	{


		echo "<script>alert('Post Deleted successful!!');
    location.href='postview.php?pg=posti';
		</script>";
	}
}
 ?>
 <style>
 .courseview{
   margin-left: 3%;
   margin-right: 3%;
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
    <th>TOPIC</th>
    <th>CONTENT</th>
    <th>PICTURE</th>
    <th>LINK</th>
    <th>ACTION</th>
  </tr>
</tr>
<?php
$qury=mysqli_query($conn,"SELECT * FROM posts ORDER BY id DESC");
$i=1;
while($rw=mysqli_fetch_array($qury))
{
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $rw["topic"];?></td>
<td><?php echo $rw["message"];?></td>
<td> <img src="<?php echo $rw["photo"];?>" width="100px" height="100px"> </td>
<td><?php echo $rw["link"];?></td>
<td><button style="background-color: orange; width:50px;"><a style="text-decoration:none; color:white;" href="editpost.php?pg=posts&id=<?php echo $rw["id"];?>">Edit</a></button>    <br>
<button style="background-color: red; width:50px;"><a style="text-decoration:none; color:white;"  onclick="javascript: return confirm('Are you sure you want to Delete user!!?');" href="?pg=posti&id=<?php echo $rw["id"]; ?>">Delete</a></button>
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
