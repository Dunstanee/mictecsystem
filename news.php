<?php
include "includes/header.php";

 ?>
 <style media="screen">

.container {
  border-radius: 5px;
  padding: 10px;
  margin: 3% 0;
}
.container img {
  float: left;
  max-width: 300px;
  width: 50%;
  margin-right: 20px;

}
hr{
  margin-top: 6%;
}
.subject{
color: navy;
text-decoration: underline;
}

 </style>
 <?php
 $qury=mysqli_query($conn,"SELECT * FROM posts ORDER BY id DESC");

 while($rw=mysqli_fetch_array($qury))
 {
 ?>
 <div class="container">
  <img src="<?php echo $rw["photo"];?>" alt="Avatar" style="width:100%;">
  <h2 class="subject"><?php echo $rw["topic"];?></h2>
  <p style="font-size:14px;"><?php echo $rw["message"];?></p>
<p > <a href="<?php echo $rw["link"];?>"><?php echo $rw["link"];?></a>   </p>
</div>
<hr>
<?php

}
?>

<?php
 include "includes/footer.php";
  ?>
