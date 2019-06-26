<?php
include "includes/header.php";
if(isset($_POST["sub"]))
{

  $pro_photo=$_FILES["photo"]["name"];
$id = $_POST["us_id"];
	//set size of Photo==$Photo_size=$FILE["Photo"]["size"];

			//submit action
			$photo_path="profile_pic/";
			$image=$photo_path.$pro_photo;

      $res =mysqli_query($conn,"SELECT photo FROM members WHERE id='$id'");
      $rw =mysqli_fetch_array($res);
      $photo=$rw["photo"];
      unlink($photo);
			$query=mysqli_query($conn,"UPDATE members SET photo='$image' WHERE id='$id'")or  mysqli_error("Error in query!!!");

			if($query){

			move_uploaded_file($_FILES["photo"]["tmp_name"],$image);
				echo "<script>alert('member registration successful!!!');
location.href='profile.php?pg=prof';
				</script>";

			}
}

 ?>
<style media="screen">
  .prof{
margin-left: 25%;
width: 50%;
border-color: red;
border-style: dashed;

  }
  .pic{
margin: 20px;
    width: 30%;
    height: 250px;
    border-radius: 50%;
  }
  .button{
    border-style: none;
    width: 60%;
    background-color: navy;
    color: white;
    height: 40px;
    margin: 20px;
  }
</style>
 <?php
 if(isset($_REQUEST["id"])){
   $qery=mysqli_query($conn,"SELECT * FROM members WHERE id=".$_REQUEST["id"]);
   $row=mysqli_fetch_array($qery);
 }
   ?>

   <div class="prof">
     <center>
       <form class="" action="profile_update.php?pg=profupdate" method="post" enctype="multipart/form-data">
         <img class="pic" src="<?php echo $row["photo"] ?>" alt="Profile Picture"><br>
         <input type="hidden" name="us_id" value="<?php echo $_REQUEST['id'];?>"><br>
         <input type="file" name="photo"><br>
         <input type="submit" name="sub" value="Save" class="button">
       </form>

</center>
   </div>



 <?php
 include "includes/footer.php";
  ?>
