
<?php
include "includes/header.php";


?>

<style>
table{
width:100%;

background-color: green;
}
td{
padding:8px;
}
tr:nth-child(even){
background-color: lightgrey;
}
tr:nth-child(odd){
background-color: lightgrey;
}

</style>
<h4><marquee>Fee Statement</marquee></h4>

<table  border="1" cellpadding="0"cellpadding="0"  width="10%";>
<tr>
<th>S/N</th>
<th>Registration Number</th>
<th>Mode of Payment</th>
<th>Amount Paid</th>
<th>Total Amount</th>
<th>Transaction id</th>
<th>Date</th>


</tr>
<?php
$Name=$_SESSION["user_name"];
$query=mysqli_query($conn,"SELECT * FROM student_statement WHERE name='$Name'");

$i=1;
while($row=mysqli_fetch_array($query))
{
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $row["registration_no"];?></td>
<td><?php echo $row["mode_payment"];?></td>
<td><?php echo $row["amount_paid"];?></td>
<td><?php echo $row["total_amount"];?></td>
<td><?php echo $row["transaction_id"];?></td>
<td><?php echo $row["date"];?></td>




	<?php
	$i++;
}
?>
</table>

<?php
include "includes/footer.php";

?>
