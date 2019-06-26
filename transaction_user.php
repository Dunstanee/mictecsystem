<?php
include "includes/header.php";

 ?>
 <style>
 .courseview{
   margin-left: 4%;
   margin-top: 3%;
 }
 #customers {
   font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
   border-collapse: collapse;
   width: 90%;
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
    <th>ACTIVITY</th>
    <th>TRANSACTION MODE</th>
    <th>TRANSACTION ID</th>
    <th>TOTAL AMOUNT</th>
    <th>BALANCE</th>
    <th>DATE</th>
    <th>STATUS</th>
  </tr>
</tr>
<?php
$d = $_SESSION["REGISTRATION_NO"];
$qury=mysqli_query($conn,"SELECT * FROM Payments WHERE registration_no='$d'");
$i=1;
while($rw=mysqli_fetch_array($qury))
{
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $rw["activity"];?></td>
<td><?php echo $rw["mode_payment"];?></td>
<td><?php echo $rw["transaction_id"];?></td>
<td><?php echo $rw["total_amount"];?></td>
<td><?php echo $rw["balance"];?></td>
<td><?php echo $rw["date"];?></td>
<td><?php if ($rw["balance"]==0) {

  ?>
<label style="background: GREEN; color: white;">COMPLETE</label>
<?php
}else if ($rw["balance"]<0) {

  ?>
  <label style="background: orange; color: white; width:100%;">OVERPAYMENT</label>
  <?php
} else if ($rw["balance"]>0) {
    ?>
    <label style="background: RED; color: white;">INCOMPLETE</label>
    <?php

} ?></td>
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
