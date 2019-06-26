
<?php
include "includes/header.php";
	if(isset($_REQUEST["id"])){
		$qr=mysqli_query($conn,"SELECT * FROM members WHERE id=".$_REQUEST["id"]);
		$rw=mysqli_fetch_assoc($qr);
	}

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
<center>
<button style="background-color:orangered; width: 80px; height:50px; margin-top:2%;"><a style="color:white; text-decoration:none" href="members.php?pg=mem">BACK</a> </button>
</center>
<div class="formview">


<form action="member_view.php?pg=mem" method="post" enctype="multipart/form-data">

<table width="100%"  cellspacing="1">
  <tr>
<td><img src="<?php echo $rw["photo"];?>" width="200px" heigth="200px"> </td><td><?php echo $rw["name"];?><br> <?php echo $rw["course"];?> <br> <?php echo $rw["registration_no"];?> </td>
  </tr>
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

<?php
include "includes/footer.php";
?>
