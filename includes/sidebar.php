
<?php
$pag =$_REQUEST["pg"];

if ($pag != "mem" and $pag != "evs" and $pag!="tranU" and $pag!="news" and $pag!="approve" and $pag!="report"and $pag!="min" and $pag!="trans" and $pag!="posti" and $pag!="prof" and $pag!="authorize" ){


  ?>


<div style="width:20%; background-color:Crimson ;border-radius: 10px;float:left;margin-top: 1%; padding: 10px;">

<?php
if (isset($_SESSION["ID"])) {

$EMAIL = $_SESSION["EMAIL"];
$quer = mysqli_query($conn,"SELECT * FROM users WHERE email='$EMAIL'");
$rw = mysqli_fetch_array($quer);
$query = mysqli_query($conn,"SELECT * FROM members WHERE email='$EMAIL'");
$row = mysqli_fetch_array($query);
 ?>
 <div style="background-color:white; padding:20px;">


 <center>
 <img style="margin: 20px; border-radius: 70px; margin-left: 10%;" src="<?php echo $row["photo"] ?>" width="150px" height="150px">

 <h3 style="color:white;">Welcome Back  <?php
 $name=$_SESSION["NAME"];

?>
<h3 style="color:maroon;"><?php  echo $name ;?></h3>
<h4 style="color:maroon;">You logged in as   :<?php echo $rw["level"];?></h4>
<h4 style="color:maroon;">Position  :<?php echo $rw["position"];?></h4>

 </h3>
  <h4 style="color:maroon;">REG NO :</h4> <h4 style="color:maroon;"> <?php echo $row["registration_no"];?></h4>
<h4 style="color:maroon;">COURSE :</h4>  <h4 style="color:maroon;">  <?php echo $row["course"];?></h4>
</center>
</div>
<?php }
else{?>
  <img style="margin: 0px; " src="logo/groupb.png" width="100%" height="200px">
  <img style=" " src="logo/groupc.png" width="100%" height="200px">
  <img style=" " src="logo/student.png" width="100%" height="200px">
<?php } ?>

</div>
<?php } ?>
