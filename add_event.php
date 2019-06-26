<?php
include "includes/header.php";
if(isset($_POST["sub"]))
{
	$activity=$_POST["activity"];
  $end_date=$_POST["end_date"];
  $description=$_POST["description"];
$amount_payable=$_POST["amount_payable"];
$date = date("Y-m-d");
	$query=mysqli_query($conn,"INSERT INTO activity VALUES(0,'$activity','$description','$amount_payable','$end_date','$date')")or  mysqli_error("Error in query!!!");

if($query){

				echo "<script>alert('Activity Added successful!!!');</script>";

			}

	}
 ?>

 <style media="screen">
   .course{
     padding: 20px;
     background: MediumTurquoise;
     height: 580px;
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
   .area{
     resize: none;
     font-size: 16px;
   }

 </style>
<div class="course">

  <form class="" action="add_event.php?pg=ev" method="post" enctype="multipart/form-data">
    <h3>Activity Name</h3>
    <input class="textt" type="text" name="activity" required>
    <h3>Description</h3>
  <textarea class="area" name="description" rows="8" cols="80"></textarea>
    <h3>End Date</h3>
    <input class="textt"  type="date" name="end_date" required>
    <h3>Amount Payable</h3>
    <input class="textt" type="text" name="amount_payable" required>
    <input class="subcourse" type="submit" name="sub" value="Add Event">
  </form>
</div>
 <?php
 include "includes/footer.php";

  ?>
