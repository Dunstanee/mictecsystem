
<?php
$pag =$_REQUEST["pg"];

if ($pag != "mem" and $pag != "evs" and $pag != "ev" and $pag!="tranU" and $pag!="resps" and $pag!="post"
and $pag!="cos" and $pag!="news" and $pag!="approve" and $pag!="report"and $pag!="min" and $pag!="trans" and $pag!="posti" and $pag!="prof" and $pag!="authorize" ){


  ?>

<style media="screen">
  .tt{
    border-bottom: 10px solid navy;
  }
</style>
<?php
if (isset($_SESSION["ID"])) {

 ?>
<div style="width:20%; background-color:Crimson ;border-radius: 10px;float:right;margin-top: 1%; padding: 10px;">

 <div style="background-color:white; padding:20px;">
 <center>
   <h2 class="tt">NOTIFICATIONS</h2>

<?php
$newdate = date("Y-m-d");
$Querp = mysqli_query($conn,"SELECT * FROM activity");

while($rowa=mysqli_fetch_array($Querp))
{
  $date1 =   $newdate;
  $date2 = $rowa["date_end"];

  $diff = abs(strtotime($date2) - strtotime($date1));

  $years = floor($diff / (365*60*60*24));
  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
  if ($days!="0" or $months!="0" or $years!="0"){
 ?>
<h3 style="color:maroon;"><?php  echo $rowa["acti_name"] ;?></h3>
<h4 style="color:maroon;">Closes : |<?php echo $days," Day |",$months," Month |",$years," Year ";?></h4>
<hr>
<?php }

} ?>
</center>
</div>


</div>

<?php }} ?>
