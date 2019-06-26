<?php
include "includes/header.php";
if (isset ($_REQUEST['id']))
{

	$del=mysqli_query($conn,"DELETE FROM users WHERE id=".$_REQUEST['id']);
	if($del)
	{


		echo "<script>alert('User Deleted successful!!');
	</script>";
	}
}
 ?>
 <style>
 .courseview{
   width: 100%;
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
 .textt{
   padding: 10px;
   width: 50%;
   font-size: 16px;


 }
 .search{
  background-color: orange;
  height: 40px;
  width: 60px;
  }
 </style>
<?php  if($_SESSION["LEVEL"]=="Admin" or $_SESSION["POSITION"]=="Chairperson" or $_SESSION["POSITION"]=="Patron"){



  ?>
 <a href="add_user.php?pg=us">Add User</a>
<?php } ?>
 <div  class="courseview" style="overflow-x:auto;">
	 <?php
	 if($_SESSION["POSITION"]=="Secretary" or $_SESSION["LEVEL"]=="Admin"){
	  ?>
<button style="width:70px; height: 30px;margin-left:80%; font-weight:bold;" onClick="printdiv('div_print')">Print	</button>

<?php } ?>
   <form class="" action="authorization.php?pg=authorize" method="post" enctype="multipart/form-data">

     <select class="textt" required name="level"><option value="">..Select Category..</option>
     <?php
     $query=mysqli_query($conn,"SELECT * FROM users group by level")or mysqli_error("Error in query!!!");
     while($row=mysqli_fetch_array($query))
     {
     echo "<option value='".$row["level"]."'>".$row["level"]."</option>";
     }
     ?>
     </select>

     <input class="search" type="submit" name="search" value="Search">

     </form>
	 </div>


		 <div id="div_print" class="courseview" style="overflow-x:auto;">
<center><h1 style="margin:20px; color:red;">LEADERS REPORT </h1>
<hr> </center>
<table id="customers" border="1" cellpadding="1" cellspacing="0">
 <tr>
	 <th>S/N</th>
	 <th>NAME</th>
	 <th>USER NAME</th>
	 <th>GENDER</th>
	 <th>COURSE</th>
	 <th>EMAIL</th>
	 <th>REGISTRATION NO</th>
	 <th>MOBILE NUMBER</th>
	 <th>POSITION</th>
	 <th>LEVEL</th>
	 <?php
if($_SESSION["LEVEL"]=="Admin"){
		?>
	 <th>ACTION</th>
 <?php } ?>
 </tr>
     <?php if (isset($_POST["search"])) {
  $level = $_POST["level"];
     $qeru = mysqli_query($conn,"SELECT * FROM users WHERE level='$level' ");
     $res= mysqli_fetch_array($qeru);

$qury=mysqli_query($conn,"SELECT * FROM users WHERE level='$level' ");
$i=1;
while($rw=mysqli_fetch_array($qury))
{
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $rw["name"];?></td>
<td><?php echo $rw["username"];?></td>
<td><?php echo $rw["gender"];?></td>
<td><?php echo $rw["course"];?></td>
<td><?php echo $rw["email"];?></td>
<td><?php echo $rw["registration_no"];?></td>
<td><?php echo $rw["mobile_no"];?></td>
<td><?php echo $rw["position"];?></td>
<td><?php echo $rw["level"];?></td>
<?php
if($_SESSION["LEVEL"]=="Admin"){
 ?>
<td>
<button style="background-color: orange; width:50px;"><a style="text-decoration:none; color:white;" href="edituser.php?pg=user&id=<?php echo $rw["id"];?>">Edit</a></button>    <br>
<button style="background-color: red; width:50px;"><a style="text-decoration:none; color:white;"  onclick="javascript: return confirm('Are you sure you want to Delete user!!?');" href="?pg=authorize&id=<?php echo $rw["id"]; ?>">Delete</a></button>
</td>
<?php } ?>
</tr>


	<?php
	$i++;
}
?>

<?php } ?>
</table>
</div>

<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>

 <?php
 include "includes/footer.php";
  ?>
