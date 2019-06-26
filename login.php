
<?php
include "includes/header.php";
if(isset($_POST["sub"]))
{
	$user=$_POST["user"];
	$pass= md5($_POST["pass"]);
	$query1=mysqli_query($conn,"SELECT status FROM users WHERE username='$user'");
	$result1=mysqli_fetch_array($query1);

if($result1["status"]=="pending"){
	unset($_SESSION["ID"]);
	unset($_SESSION["NAME"]);
	unset($_SESSION["USER"]);
	unset($_SESSION["EMAIL"]);
	unset($_SESSION["REGISTRATION_NO"]);
	unset($_SESSION["POSITION"]);
	unset($_SESSION["LEVEL"]);
		echo "<script>alert('Your Details are yet to be Approved. Try again later');</script>";


}	else{
	$query=mysqli_query($conn,"SELECT * FROM users WHERE username='$user' and password='$pass'");

	$result=mysqli_num_rows($query);

	if($result>0){
		$row=mysqli_fetch_assoc($query);//GET EACH COLOUM FROM THE QUERY
		$_SESSION["ID"]=$row["id"];//$_SESSION=CREATE AND USE  THIS VARIABLE ANYWHERE IN UR FILE E.G(FACEBOOK USERNAME)
		$_SESSION["NAME"]=$row["name"];
		$_SESSION["USER"]=$row["username"];
		$_SESSION["EMAIL"]=$row["email"];
		$_SESSION["REGISTRATION_NO"]=$row["registration_no"];
		$_SESSION["POSITION"]=$row["position"];
		$_SESSION["LEVEL"]=$row["level"];


		echo "<script>
		alert('Login successful!!');
		location.href='index.php?pg=hm';</script>";

	}else{

		echo "<script>alert('Sorry.Login Failed!!');</script>";
	}
	}
}

?>
<style media="screen">
  .login{
margin-top: 3%;
    margin-left: 30%;
    margin-right: 30%;
    background: LightSkyBlue;
    padding: 30px;
  }
  .text1{
    width: 60%;
    padding: 10px;

  }

  .pass{
    width: 30%;
    background-color: limegreen;
    color: white;
    height: 50px;
  }
</style>

<div class="login">

<center>
<h1 style="color: red;">Login Here</h1>
</center>
<form action="login.php?pg=lg" method="post" enctype="multipart/form-data">

 <h2>User name</h2>  <input class="text1" type="text" name="user" required>
 <h2>Password</h2>  <input class="text1" type="password" name="pass" required><h1></h1>
<input class="pass" type="submit" name="sub" value="Login">


<p><a href="">Forgot Password?</a></p>
</form>
</div>






<?php
include "includes/footer.php";
?>
