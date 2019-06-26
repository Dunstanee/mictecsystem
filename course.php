<?php
include "includes/header.php";
if(isset($_POST["sub"]))
{
	$course=$_POST["course"];
  $duration=$_POST["duration"];
  $date=$_POST["date_registered"];

	$query=mysqli_query($conn,"INSERT INTO course VALUES(0,'$course','$duration','$date')")or  mysqli_error("Error in query!!!");

if($query){

				echo "<script>alert('Course Added successful!!!');</script>";

			}

	}
 ?>

 <style media="screen">
   .course{
     padding: 20px;
     background: MediumTurquoise;
     height: 500px;
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

  <form class="" action="course.php?pg=cos" method="post" enctype="multipart/form-data">
    <h3>Course Name</h3>
    <input class="textt" type="text" name="course" required>
    <h3>Duration</h3>
  <select class="textt" name="duration">
    <option value="">....select duration...</option>
    <option value="1 Year">1 Years</option>
    <option value="2 Years">2 Years</option>
    <option value="3 Years">3 Years</option>
    <option value="4 Years">4 Years</option>
    <option value="5 Years">5 Years</option>
    <option value="6 Years">6 Years</option>
  </select>
    <h3>Date Registered</h3>
    <input class="textt"  type="date" name="date_registered" required>
    <input class="subcourse" type="submit" name="sub" value="Add Course">
  </form>
</div>
 <?php
 include "includes/footer.php";

  ?>
