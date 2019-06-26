<?php
include "includes/header.php";

if(isset($_GET["dow"])){

  $path= $_GET["dow"];

  $res = mysqli_query($conn,"SELECT * FROM documents WHERE path='$path'");

  header('Contect-Type:|application/octet-stream');
  header('Content-Disposition: attatchment; filename="'.basename($path).'"');
  header('Content-Length: '. filesize($path));
  readfile($path);
}
 ?>



 <?php
 include "includes/footer.php";
  ?>
