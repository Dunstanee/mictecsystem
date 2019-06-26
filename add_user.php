<?php
 include "includes/header.php";
 if(isset($_POST["sub"]))
 {
 	$name=$_POST["name"];
   $username=$_POST["username"];
   $regno=$_POST["regno"];
   $position=$_POST["position"];
   $course=$_POST["course"];
   $gender=$_POST["gender"];
 	$email=$_POST["email"];
  $level=$_POST["level"];
 	$mobno=$_POST["mobile"];
 	$date=date("d-m-y");
 	//set size of Photo==$Photo_size=$FILE["Photo"]["size"];

 	$password=md5($_POST["password"]);
 	$con_password=md5($_POST["conpass"]);


 	$result=mysqli_query($conn,"SELECT*FROM users WHERE email='$email' ")or mysqli_error("Error in query");
 	$member_check=mysqli_num_rows($result);


 	if($member_check==0)
 	{
 		//submit action here
 		if($password==$con_password)
 		{
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}else{

 			$query=mysqli_query($conn,"INSERT INTO users VALUES(0,'$name','$username','$gender','$course','$email','$regno','$mobno','$position','$level','$date','$password')") or mysqli_error("Error in query!!!");


 			if($query){

 	echo "<script>alert('User Added successful!!!');
 location.href='authorization.php?pg=authorize';
 				</script>";

 			}
}
 		}else
 		{
 			echo "<script>alert ('password and confirm password are not matching!!!);</script>";
 		}
 	}else
 		{
 		echo "<script>alert ('The user already exists!!!);</script>";
 		}
 	}
  ?>
  <style media="screen">
    .usout{
      margin-left: 30%;
      background-color: Crimson;
      width: 40%;
      padding: 20px;
    }
    .inp{
width: 80%;
height: 40px;
margin: 10px;

    }
    .button{
      border-style: none;
      width: 50%;
      background-color: navy;
      color: white;
      height: 40px;
      margin: 20px;
      cursor: pointer;
    }
  </style>
<div class="usout">


  <div >
    <h1>Add User</h1>
    <hr>
    <form action="add_user.php?pg=adduser" method="post" enctype="multipart/form-data">

    <label for="email"><b>Full Name</b></label><h2></h2>
    <input class="inp" type="text" placeholder="Enter Full Name" name="name" required><h2></h2>
    <label for="email"><b>User Name</b></label><h2></h2>
    <input class="inp"  type="text" name="username" required><h2></h2>
    <label for="email"><b>Registration Number</b></label><h2></h2>
    <input class="inp"  type="text"  name="regno" required><h2></h2>
    <label for="email"><b>Gender</b></label><h2></h2>
    <select class="inp" name="gender">
      <option value="Male">Male</option>
      <option value="Female">Female</option>

    </select><h2></h2>
    <label for="email"><b>Course</b></label><h2></h2>
    <select class="inp" required name="course" class="course"><option value="">..Select Course..</option>
    <?php
    $query=mysqli_query($conn,"SELECT * FROM course")or mysqli_error("Error in query!!!");
    while($row=mysqli_fetch_array($query))
    {
    echo "<option value='".$row["course_name"]."'>".$row["course_name"]."</option>";
    }
    ?>
    </select><h2></h2>
    <label for="email"><b>Mobile Number</b></label><h2></h2>
    <input class="inp"  type="text"  name="mobile" required><h2></h2>
    <label for="email"><b>Email</b></label><h2></h2>
    <input class="inp"  type="text" placeholder="Enter Email" name="email" required><h2></h2>
    <label for="email"><b>Position</b></label><h2></h2>
    <select required name="position" class="inp"><option value="">..Select Position..</option>
    <?php
    $query=mysqli_query($conn,"SELECT * FROM position")or mysqli_error("Error in query!!!");
    while($row=mysqli_fetch_array($query))
    {
    echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
    }
    ?>
    </select><h2></h2>
    <label><b>level</b></label><h2></h2>
    <select class="inp" name="level">
      <option value="">Choose level...</option>
      <option value="Admin">Admin</option>
      <option value="Official">Official</option>
      <option value="Patron">Patron</option>
    </select><h2></h2>

    <label><b>Password</b></label><h2></h2>
    <input class="inp"  type="password"  pattern="{8,8}" title="Please use at most 8 characters" placeholder="Enter Password" name="password" required><h2></h2>

    <label><b>Repeat Password</b></label><h2></h2>
    <input class="inp"  type="password" placeholder="Repeat Password" name="conpass" required>
    <input type="submit" name="sub" value="Add User" class="button">

    </form>
    </div>
    </div>
<?php
 include "includes/footer.php";
  ?>
