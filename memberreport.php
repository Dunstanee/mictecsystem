<?php
include "includes/header.php";
include "includes/minutesidebar.php";
if(isset($_REQUEST['id'])){
	$res =mysqli_query($conn,"SELECT profile_pic FROM members WHERE id=".$_REQUEST['id']);
	$rw =mysqli_fetch_assoc($res);
	$photo=$rw['photo'];
	$email=$rw['email'];

	$del=mysqli_query($conn,"DELETE FROM members WHERE id=".$_REQUEST['id']);
	if($del){
		unlink($photo);
		mysqli_query($conn,"DELETE FROM users WHERE email='$email'");
		echo "<script>alert('Member deleted successful!!');location.href='members.php?pg=mem';</script>";
	}

}

?>
<style>
.courseview{
  margin-left: 25%;

}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 3%;

  border: 1;
  border-color: red;

}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 2px;
}

#customers tr:nth-child(even){background-color: Aquamarine ;}
#customers tr:nth-child(odd){background-color: Aqua  ;}
#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: red;
  color: white;
}
</style>

<button style="width:70px; height: 30px;margin-left:80%; font-weight:bold;" onClick="printdiv('div_print')">Print	</button>
<div style="overflow-x:auto;" id="div_print">
<center><h1 style="margin:20px; color:red;">REGISTERED MICTEC MEMBERS</h1> </center>
<table id="customers" border="1" cellpadding="1" cellspacing="0" >
<tr>
<th>S/N</th>
<th>NAME</th>
<th>REGISTRATION NUMBER</th>
<th>GENDER</th>
<th>COURSE</th>
<th>ADDRESS</th>
<th>EMAIL</th>
<th>DATE OF BIRTH</th>
<th>MOBILE NO:</th>
<th>DATE REGISTERED</th>
</tr>
<?php
$query0 = mysqli_query($conn,"SELECT * FROM members");
$i=1;
while($row0 =mysqli_fetch_array($query0)){
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row0["name"];?></td>
<td><?php echo $row0["registration_no"];?></td>
<td><?php echo $row0["gender"];?></td>
<td><?php echo $row0["course"];?></td>
<td><?php echo $row0["address"];?></td>
<td><?php echo $row0["email"];?></td>
<td><?php echo $row0["dob"];?></td>
<td><?php echo $row0["mobile_no"];?></td>
<td><?php echo $row0["date_registered"];?></td>

</tr>
<?php
$i++;
}
?>

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
