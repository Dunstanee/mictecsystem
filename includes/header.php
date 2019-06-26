<?php
session_start();
$page =$_REQUEST["pg"];
if (!isset($_SESSION["ID"]) and $page !="hm" and $page !="rg" and $page !="lg") {
echo "<script>
location.href='index.php?pg=hm';
</script>";
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      <?php
      include "includes/config.php";

      ?>
    </title>
  </head>
  <body>
<div style=" padding:10PX;height:160px; ">
    <img src="logo/mictec.png" style="width:10%; height:150px; float:right; margin-right: 10px;">
    <img src="logo/ttu.png" style="width:10%; height:150px; float:left;">


  <center>
  <div style="width:50%;">
<h1 style="color:green;">TAITA TAVETA UNIVERSITY</h1>
<h2 style="color:orangered;">MICTEC CLUB</h2>
<h3 style=" color:orangered;">MATHS AND ICT FOR DEVELOPMENT</h3>
</div>
</center>

</div>


<?php
include "includes/menu.php";
 ?>

 <h3 style=" color:orangered;">This System is Under Maintenance</h3>
 <?php
 include "includes/notification.php";

  ?>
 <?php
 include "includes/sidebar.php";

  ?>
