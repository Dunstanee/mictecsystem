<?php
include "includes/header.php";
if(isset($_POST["sub"]))
{
  $id=$_POST["us_id"];
	$subject=$_POST["subject"];
  $content=$_POST["content"];
  $pro_photo=$_FILES["photo"]["name"];
	$link = $_POST["link"];
  $date=date("d-m-Y");
  $photo_path="post_pic/";
  $image=$photo_path.$pro_photo;

	$query=mysqli_query($conn,"UPDATE posts SET topic='$subject',photo='$image',message='$content',link='$link' WHERE id='$id'")or  mysqli_error("Error in query!!!");

if($query){
	move_uploaded_file($_FILES["photo"]["tmp_name"],$image);
				echo "<script>
        alert('Post Updated successful!!!');
location.href='postview.php?pg=posti';
        </script>";

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
 <?php
 if(isset($_REQUEST["id"])){
   $qery=mysqli_query($conn,"SELECT * FROM posts WHERE id=".$_REQUEST["id"]);
   $row=mysqli_fetch_array($qery);
 }
   ?>
<div class="course">

  <form class="" action="editpost.php?pg=posts" method="post" enctype="multipart/form-data">
    <input type="hidden" name="us_id" value="<?php echo $_REQUEST['id'];?>">

    <h3>Subject</h3>
    <input class="textt" type="text" name="subject" value="<?php echo $row["topic"] ?>" required>
    <h3>Content</h3>
<textarea name="content" rows="8" style="width:60%; resize: none;" required><?php echo $row["message"] ?></textarea>
    <h3>photo</h3>
    <input type="file" name="photo" required>
		<h3>link</h3>
    <input class="textt" type="text" name="link" value="<?php echo $row["link"] ?>" required><br>
    <input class="subcourse" type="submit" name="sub" value="Update Post">
  </form>
</div>
 <?php
 include "includes/footer.php";

  ?>
