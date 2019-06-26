<?php
include "includes/header.php";
if(isset($_POST["sub"])){
  $doc_name = $_POST["doc_name"];
$file=$_FILES["myfilename"]["name"];
$date = date("d-m-Y");

if ($name or $doc_name) {
  $file_path="documents/";
  $location=$file_path.$file;
  	move_uploaded_file($_FILES["myfilename"]["tmp_name"],$location);
  $query = mysqli_query($conn,"INSERT INTO documents  VALUES(0,'$doc_name','$location','$date')");
header('Location: viewminute.php?pg=min');



}else
die("Please select a file");

}
include "includes/minutesidebar.php";
 ?>
 <style media="screen">
   .load{
     margin-left: 25%; /* Same as the width of the sidenav */
     font-size: 20px; /* Increased text to enable scrolling */
     padding:20px;
     width: 50%;
     border-radius: 40px;
     background-color: lightblue;
   }
   .tt{
height:20px;
width: 30%;
 margin: 20PX;
padding: 10px;
   }
   .tat{
     background-color: green;
     width: 50%;
     height:40px;
     margin: 20PX;
     border-radius: 40px;
   }
 </style>
<div class="load">

<center>
<form class="" action="addminutes.php?pg=min" method="post" enctype="multipart/form-data">
<label>Document Name</label>
<input class="tt" type="text" name="doc_name" ><br>
<input  type="file" name="myfilename"><br>
<input class="tat" type="submit" name="sub" value="UPLOAD">
</form>
</center>
</div>
 <?php
 include "includes/footer.php";
  ?>
