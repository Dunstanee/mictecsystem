<?php
include "includes/header.php";
if(isset($_POST["sub"]))
{
	$subject=$_POST["subject"];
  $content=$_POST["content"];
  $pro_photo=$_FILES["photo"]["name"];
	$link = $_POST["link"];
  $date=date("d-m-Y");

  $photo_path="post_pic/";
  $image=$photo_path.$pro_photo;

	$query=mysqli_query($conn,"INSERT INTO posts VALUES(0,'$subject','$image','$content','$link','$date')")or  mysqli_error("Error in query!!!");

if($query){
	move_uploaded_file($_FILES["photo"]["tmp_name"],$image);
				echo "<script>alert('Post Added successful!!!');</script>";

			}

	}
 ?>

 <style media="screen">
   .course{
     padding: 20px;
     background: MediumTurquoise;

     margin-left: 30%;
     margin-right: 20%;
     margin-top: 2%;
     border-radius: 5px;
   }
   .textt{
     padding: 10px;
     width: 75%;
     font-size: 16px;

   }
   .subcourse{
     margin-top: 2%;
     width: 50%;
     height: 50px;
     background-color: LawnGreen;
   }

 </style>
<div class="course">

  <form class="" action="addpost.php?pg=post" method="post" enctype="multipart/form-data">
    <h3>Subject</h3>
    <input class="textt" type="text" name="subject" required>
    <h3>Content</h3>
<textarea name="content" rows="8" style="width:60%; resize: none;" required></textarea>
    <h3>photo</h3>
    <input type="file" name="photo" required>
		<h3>link</h3>
    <input class="textt" type="text" name="link" required><br>
    <input class="subcourse" type="submit" name="sub" value="Add Post">
  </form>
</div>
 <?php
 include "includes/footer.php";

  ?>
