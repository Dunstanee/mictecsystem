<?php
include "includes/header.php";
include "includes/accountsidebar.php";
if (isset ($_REQUEST['id']))
{

	$del=mysqli_query($conn,"DELETE FROM payments WHERE id=".$_REQUEST['id']);
	if($del)
	{


		echo "<script>alert('Transaction Deleted successful!!');
	</script>";
	}
}
 ?>
 <style>
 .courseview{
   margin-left: 20%;
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
 <div class="courseview">
   <form class="" action="transaction.php?pg=trans" method="post" enctype="multipart/form-data">

     <select class="textt" required name="act"><option value="">..Select Activity ..</option>
     <?php
     $query=mysqli_query($conn,"SELECT * FROM payments group by activity")or mysqli_error("Error in query!!!");
     while($row=mysqli_fetch_array($query))
     {
     echo "<option value='".$row["activity"]."'>".$row["activity"]."</option>";
     }
     ?>
     </select>

     <input class="search" type="submit" name="search" value="Search">

     </form>

		  <table id="customers">
		   <tr>
		     <th>S/N</th>
		     <th>STUDENT NAME</th>
		     <th>REGISTRATION NO</th>
		     <th>ACTIVITY</th>
		     <th>MODE OF PAYMENT</th>
		     <th>TRANSACTION ID</th>
		     <th>TOTAL AMOUNT</th>
		     <th>BALANCE</th>
				 <?php if($_SESSION["POSITION"]=="Treasurer" or  $_SESSION["LEVEL"]=="Admin"  ){ ?>
		     <th>DATE</th>
		     <th>ACTION</th>
			 <?php } ?>
		   </tr>

     <?php if (isset($_POST["search"])) {
  $ACTIVIT = $_POST["act"];
     $qeru = mysqli_query($conn,"SELECT * FROM payments WHERE activity='$ACTIVIT' ");
     $res= mysqli_fetch_array($qeru);
      ?>

<?php
$qury=mysqli_query($conn,"SELECT * FROM payments WHERE activity='$ACTIVIT' ");
$i=1;
while($rw=mysqli_fetch_array($qury))
{
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $rw["name"];?></td>
<td><?php echo $rw["registration_no"];?></td>
<td><?php echo $rw["activity"];?></td>
<td><?php echo $rw["mode_payment"];?></td>
<td><?php echo $rw["transaction_id"];?></td>
<td><?php echo $rw["total_amount"];?></td>
<td><?php echo $rw["balance"];?></td>
<?php if($_SESSION["POSITION"]=="Treasuer" or $_SESSION["LEVEL"]=="Admin"  ){ ?>
<td><?php echo $rw["date"];?></td>
<td>
<button style="background-color: red; width:50px;"><a style="text-decoration:none; color:white;"  onclick="javascript: return confirm('Are you sure you want to Delete user!!?');" href="?pg=trans&id=<?php echo $rw["id"]; ?>">Delete</a></button></td>
<?php } ?>
</tr>


	<?php
	$i++;
}
?>
<tr>
	<th colspan="6"></th>

	<th><?php $result = mysqli_query($conn,"SELECT sum(total_amount) FROM payments WHERE activity='$ACTIVIT'") or die(mysql_error());
	while ($rows = mysqli_fetch_array($result)) {
	 echo $rows['sum(total_amount)']; }?></th>
	 <th> <?php $result = mysqli_query($conn,"SELECT sum(balance) FROM payments WHERE activity='$ACTIVIT'") or die(mysql_error());
 	while ($rows = mysqli_fetch_array($result)) {
 	 echo $rows['sum(balance)']; }?></th>
	<th colspan="2"></th>

</tr>
<?php } ?>

</table>
</div>

</div>
 <?php
 include "includes/footer.php";
  ?>
