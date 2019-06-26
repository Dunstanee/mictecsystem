
<?php
include "includes/header.php";
if(isset($_POST["sub"]))
{
	$activity=$_POST["activity"];
  $id=$_POST["activity_id"];
  $end_date=$_POST["end_date"];
  $description=$_POST["description"];
$amount_payable=$_POST["amount_payable"];
$date = date("Y-m-d");
	$query=mysqli_query($conn,"UPDATE activity SET acti_name='$activity',description='$description',Amount_to_pay='$amount_payable',date_end='$end_date' WHERE id='$id'")or  mysqli_error("Error in query!!!");

if($query){

				echo "<script>alert('Activity Updated successful!!!');
location.href='events.php?pg=evs';
        </script>";

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
  <?php
  if(isset($_REQUEST["id"])){
    $qery=mysqli_query($conn,"SELECT * FROM activity WHERE id=".$_REQUEST["id"]);
    $row=mysqli_fetch_array($qery);
  }
    ?>
  <form  action="edit_events.php?pg=ev" method="post" enctype="multipart/form-data">
    <input type="hidden" name="activity_id" value="<?php echo $_REQUEST['id'];?>">
    <h3>Activity Name</h3>
    <input class="textt" type="text" name="activity" value="<?php echo $row["acti_name"] ?>" required>
    <h3>Description</h3>
  <textarea class="area" name="description" rows="8" cols="80"><?php echo $row["description"] ?></textarea>
    <h3>End Date</h3>
    <input class="textt"  type="date" name="end_date" value="<?php echo $row["date_end"] ?>" required>
    <h3>Amount Payable</h3>
    <input class="textt" type="text" name="amount_payable" value="<?php echo $row["Amount_to_pay"] ?>" required>
    <input class="subcourse" type="submit" name="sub" value="Update Event">
  </form>
</div>
 <?php
 include "includes/footer.php";

  ?>
