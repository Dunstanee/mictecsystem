
<?php
include "includes/header.php";
$name=$_SESSION["NAME"];
$email =	$_SESSION["EMAIL"];
$reg=$_SESSION["REGISTRATION_NO"];
		$qr=mysqli_query($conn,"SELECT * FROM members WHERE email='$email'");
		$rw=mysqli_fetch_array($qr);


?>
<style media="screen">
  .formview{
border-style: solid;
border-color: red;
margin-left: 20%;
margin-right: 20%;

padding: 20px;
margin-top: 1%;

  }
	td{
		padding: 20px;
	}
</style>
<button style="width:70px; height: 30px;margin-left:80%; font-weight:bold;" onClick="printdiv('div_print')">Print	</button>

<div class="formview" id="div_print">


<form action="member_view.php?pg=mem" method="post" enctype="multipart/form-data">

<table width="100%"  cellspacing="1">
  <tr>
<td><img src="<?php echo $rw["photo"];?>" width="200px" heigth="200px"> </td><td><?php echo $name ?><br> <?php echo $rw["course"];?> <br> <?php echo $rw["registration_no"];?> </td>
  <a style="text-decoration:none" href="profile_update.php?pg=profupdate&id=<?php echo $rw["id"];?>">Change Photo</a></tr>
<tr style="background:LavenderBlush;">
  <td> Date of birth:</td> <td><?php echo $rw["dob"];?></td>
</tr>
<tr style="background:LavenderBlush;">
  <td> GENDER</td> <td><?php echo $rw["gender"];?></td>
</tr>
<tr style="background:LavenderBlush;">
  <td> ADDRESS</td> <td><?php echo $rw["address"];?></td>
</tr>
<tr style="background:LavenderBlush;">
  <td> EMAIL</td> <td><?php echo $rw["email"];?></td>
</tr>
<tr style="background:LavenderBlush;">
  <td> MOBILE NO:</td> <td><?php echo $rw["mobile_no"];?></td>
</tr>

</table>

</form>

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
