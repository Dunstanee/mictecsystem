
<?php
include "includes/header.php";
if(isset($_POST["sub"]))
{
	$name=$_POST["name"];
  $username=$_POST["user"];
  $regno=$_POST["regno"];
  $course=$_POST["course"];
  $datestart=$_POST["datestart"];
  $dateend=$_POST["dateend"];
  $pro_photo=$_FILES["photo"]["name"];
  $address=$_POST["addr"];
  $gender=$_POST["gender"];
	$email=$_POST["email"];
	$dob=$_POST["dob"];
	$mobno=$_POST["mobno"];
	$date=date("d-m-y");
	//set size of Photo==$Photo_size=$FILE["Photo"]["size"];

	$password=md5($_POST["pass"]);
	$con_password=md5($_POST["compass"]);


	$result=mysqli_query($conn,"SELECT*FROM members WHERE email='$email' ")or mysqli_error("Error in query");
	$member_check=mysqli_num_rows($result);


	if($member_check==0)
	{
		//submit action here
		if($password==$con_password)
		{
			//submit action
			$photo_path="profile_pic/";
			$image=$photo_path.$pro_photo;

			$query=mysqli_query($conn,"INSERT INTO members VALUES(0,'$name','$username','$regno','$course','$datestart','$dateend','$image','$address','$gender','$email','$dob','$mobno','$date','$password')")or  mysqli_error("Error in query!!!");
			$queryy=mysqli_query($conn,"INSERT INTO approval_table VALUES(0,'$name','$regno','$course','$mobno','$address','$email','$image','$date','pending')")or  mysqli_error("Error in query!!!");

			if($query){

			move_uploaded_file($_FILES["photo"]["tmp_name"],$image);
			mysqli_query($conn,"INSERT INTO users VALUES(0,'$name','$username','$gender','$course','$email','$regno','$mobno','Member','Member','$date','$password','pending')") or mysqli_error("Error in query!!!");

				echo "<script>alert('member registration successful!!! Your account will be activated in 60s');
location.href='login.php?pg=lg';
				</script>";

			}

		}else
		{
			echo "<script>alert ('password and confirm password are not matching!!!);</script>";
		}
	}else
		{
		echo "<script>alert ('the member already exists!!!);</script>";
		}
	}
?>



<div style="background:LightSkyBlue; margin-left: 25%; margin-right: 25%; padding: 20px; border-radius: 30px; margin-top: 3%; width: 65%;">
  <center>
  <h4 style="color:red; font-size: 30px;">MEMBER REGISTRATION</h4>
  </center>
  <style media="screen">
    h3{
      font-size: 18px;

    }
    .text{
      font-size: 18px;
      padding: 10px;
      width: 70%;
      cursor: pointer;
      border-radius: 30px;
      box-shadow: 0px;
    }
    .date{
      width: 30%;
      height: 20px;
      padding: 10px;
      font-weight: bold;
    }
    .textarea{
      resize: none;
      height: 40%;
      width: 40%;
      font-size: 18px;
      padding: 10px;
    }
    .course{
      font-size: 18px;
      padding: 10px;
      width: 60%;
      cursor: pointer;
;
    }
    input:hover{
      border-color: red;
    }
    .subbtn{
      width: 30%;
      background-color: green;
      padding: 10px;
      font-size: 18px;
      margin-top: 4%;

    }
  </style>

<form action="registration.php?pg=rg" method="post" enctype=
"multipart/form-data">
<h3>Enter Full Name</h3>
<input class="text" type="text" name="name" required>
<h3>Enter User Name</h3>
<input class="text" type="text" name="user" required>
<h3>Registration Number</h3>
<input class="text" type="text" name="regno" required>
<h3>Course</h3>
<select required name="course" class="course"><option value="">..Select Course..</option>
<?php
$query=mysqli_query($conn,"SELECT * FROM course")or mysqli_error("Error in query!!!");
while($row=mysqli_fetch_array($query))
{
echo "<option value='".$row["course_name"]."'>".$row["course_name"]."</option>";
}
?>
</select>
<h3>Joined Year</h3>
<input class="date"  type="date" name="datestart" required>
<h3>End Year</h3>
<input class="date" type="date" name="dateend" required>
<h3>Profile Picture</h3>
<input type="file" name="photo" >
<h3>Address</h3>
<textarea class="textarea" name="addr"></textarea>
<h3> Gender</h3>
<input type="radio" name="gender" value="male"> Male<input type="radio" name="gender" value="female "> Female
<h3>Email</h3>
<input class="text" type="email" name="email">
<h3>Dtae of Birth</h3>
<input class="date" type="date" name="dob" required>
<h3> Mobile number</h3>
<input class="text" type="text" name="mobno">
<h3> Password:</h3><input class="text" type="password" name="pass" required>
<h3>confirm Password</h3><input class="text" type="password" name="compass" required></td></tr>
<input class="subbtn" type="submit" name="sub" value="Register">

</form>

</div>


<?php
include "includes/footer.php";
?>
