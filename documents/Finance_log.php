<?php
include "includes/header.php";

if (isset ($_REQUEST['id']))
{

	$del=mysqli_query($conn,"DELETE FROM student_statement WHERE id=".$_REQUEST['id']);
	if($del)
	{


		echo "<script>alert('Data deleted successful!!');
		location.href='finance_log.php?pg=fl';</script>";
	}
}

?>
<h4><marquee>Finance_log</marquee></h4>

<table  border="1" cellpadding="0"  width="100%";>
<tr>
<th>S/N</th>
<th>name</th>
<th>registration_no</th>
<th>mode_payment</th>
<th>amount_paid</th>
<th>transaction_id</th>
<th>date</th>
<th>Action</th>

</tr>
<?php
$query=mysqli_query($conn,"SELECT * FROM student_statement");
$i=1;
while($row=mysqli_fetch_array($query))
{
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $row["name"];?></td>
<td><?php echo $row["registration_no"];?></td>
<td><?php echo $row["mode_payment"];?></td>
<td><?php echo $row["amount_paid"];?></td>
<td><?php echo $row["total_amount"];?></td>
<td><?php echo $row["transaction_id"];?></td>
<td><?php echo $row["date"];?></td>

<td><a  onclick="javascript: return confirm('Are you sure you want to Delete user!!?');"
href="?pg=fl&id=<?php echo $row["id"]; ?>">Delete</a>
</tr>


	<?php
	$i++;
}
?>
</table>











<?php
include "includes/footer.php";
?>
