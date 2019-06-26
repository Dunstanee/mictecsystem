<?php
include "includes/header.php";
if(isset($_POST["sub"]))
{
  $id=$_POST["us_id"];
	$name=$_POST["name"];
  $username=$_POST["username"];
$gender=$_POST["gender"];
	$course = $_POST["course"];
  $email = $_POST["email"];
  $regno = $_POST["regno"];
  $mobile = $_POST["mobile"];
  $position = $_POST["position"];
  $level = $_POST["level"];

$queryd= mysqli_query($conn,"UPDATE users SET name='$name',username='$username',gender='$gender',course='$course',email='$email',registration_no='$regno',mobile_no='$mobile',position='$position',level='$level' WHERE id='$id'") or mysqli_error("Error in query!!!");

if($queryd){

				echo "<script>
        alert('User Updated successful!!!');
location.href='authorization.php?pg=authorize';
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
   $qery=mysqli_query($conn,"SELECT * FROM users WHERE id=".$_REQUEST["id"]);
   $row=mysqli_fetch_array($qery);
 }
   ?>
<div class="course">

  <form class="" action="edituser.php?pg=user" method="post" enctype="multipart/form-data">
    <input type="hidden" name="us_id" value="<?php echo $_REQUEST['id'];?>">

<h3>Name</h3>
<input class="textt" type="text" name="name" value="<?php echo $row["name"] ?>" required>
<h3>User Name</h3>
<input class="textt" type="text" name="username" value="<?php echo $row["username"] ?>" required>
<h3>Gender</h3>
<input type="radio" name="gender" <?php if($row["gender"]=="female"){ echo "checked";} ?> value="female"> Female <br>
<input type="radio" name="gender" <?php if($row["gender"]=="male"){ echo "checked";} ?> value="male"> Male
<h3>Course</h3>
<select required name="course" class="textt" >
  <option value=""><?php echo $row["course"] ?></option>
<?php
$queryc=mysqli_query($conn,"SELECT * FROM course")or mysqli_error("Error in query!!!");
while($rowc=mysqli_fetch_array($queryc))
{
echo "<option value='".$rowc["course_name"]."' selected>".$rowc["course_name"]."</option>";
}
?>
</select><h3>Email</h3>
<input class="textt" type="text" name="email" value="<?php echo $row["email"] ?>" required>
<h3>Registration_no</h3>
<input class="textt" type="text" name="regno" value="<?php echo $row["registration_no"] ?>" required>
<h3>Mobile Number</h3>
<input class="textt" type="text" name="mobile" value="<?php echo $row["mobile_no"] ?>" required>
<h3>Position</h3>
<select required name="position" class="textt" ><option value="" ><?php echo $row["position"] ?></option>
<?php
$querya=mysqli_query($conn,"SELECT * FROM position")or mysqli_error("Error in query!!!");
while($rowa=mysqli_fetch_array($querya))
{
echo "<option value='".$rowa["name"]."' selected>".$rowa["name"]."</option>";
}
?>
</select>
<h3>level</h3>
<select required name="level" class="textt" ><option value="" selected><?php echo $row["level"] ?></option>
<?php
$queryb=mysqli_query($conn,"SELECT * FROM user_type")or mysqli_error("Error in query!!!");
while($rowb=mysqli_fetch_array($queryb))
{
echo "<option value='".$rowb["name"]."' >".$rowb["name"]."</option>";
}
?>
</select><br>
    <input class="subcourse" type="submit" name="sub" value="Update Post">
  </form>
</div>
 <?php
 include "includes/footer.php";

  ?>
