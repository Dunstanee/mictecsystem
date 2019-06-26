<?php
include "includes/header.php";

if(isset($_POST["sub"]))
{
  $name=$_SESSION["NAME"];
	$email=$_POST["email"];
  $message=$_POST["message"];
  $subject=$_POST["subject"];
  $date =date("Y-m-d");

	$query=mysqli_query($conn,"INSERT INTO messages VALUES(0,'$name','$subject','$message','$email','$date')")or  mysqli_error("Error in query!!!");

if($query){

				echo "<script>alert('Message Sent successful!!!');</script>";

			}

	}
 ?>

 <style media="screen">
   .course{
     padding: 20px;
     background: MediumTurquoise;

     margin-left: 30%;
     margin-right: 24%;
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
   .area{
     resize: none;
     font-size: 16px;
   }
 </style>
<div class="course">

  <form class="" action="contact_users.php?pg=contact" method="post" enctype="multipart/form-data">
    <h3>Email</h3>
<input class="textt"  type="text" name="email" required>
    <h3>Subject</h3>
<input class="textt"  type="text" name="subject" required>

    <h3>Message</h3>
    <textarea class="area" name="message" rows="8" style="width: 80%"></textarea>
    <input class="subcourse" type="submit" name="sub" value="Send Message">
  </form>
</div>
 <?php
 include "includes/footer.php";

  ?>
