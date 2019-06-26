<?php
include "includes/header.php";

include "includes/accountsidebar.php";
if(isset($_POST["sub"]))
{

	$regno=$_POST["regno"];
  $mode=$_POST["mode"];
  $trans_id=$_POST["trans_id"];
  $amount_rec=$_POST["amount_rec"];
  $total=$_POST["amount_rec"];
  $activity=$_POST["activity"];

  $date =date("Y-m-d");

  $qery=mysqli_query($conn,"SELECT * FROM members WHERE registration_no='$regno'")or mysqli_error("Error in query!!!");
$real=mysqli_fetch_array($qery);
$name = $real["name"];

  $qury=mysqli_query($conn,"SELECT * FROM activity WHERE acti_name='$activity'");
  $rw=mysqli_fetch_array($qury);
  $t = $rw["Amount_to_pay"];

    $balance = ($t) -($total);
	$query=mysqli_query($conn,"INSERT INTO payments VALUES(0,'$name','$regno','$mode','$trans_id','$amount_rec','$total',$balance,'$activity','$date')")or  mysqli_error("Error in query!!!");

if($query){

				echo "<script>alert('Payments Done successful!!!');</script>";

			}

	}
 ?>

 <style media="screen">
   .course{
     padding: 20px;
     background: MediumTurquoise;

     margin-left: 20%;
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

  <form class="" action="enter_transaction.php?pg=trans" method="post" enctype="multipart/form-data">
    <h3>Registration NO:</h3>
    <select class="textt" required name="regno"><option value="">..Select Registration NO..</option>
    <?php
    $query=mysqli_query($conn,"SELECT * FROM members")or mysqli_error("Error in query!!!");

    while($row=mysqli_fetch_array($query))
    {
    echo "<option value='".$row["registration_no"]."'>".$row["registration_no"]."</option>";
    }
    ?>
    </select>

    <h3>Mode of Payment</h3>
  <select class="textt" name="mode">
    <option value="">....select duration...</option>
    <option value="MPESA">MPESA</option>
    <option value="CASH">CASH</option>
    <option value="BANK">BANK</option>

  </select>
    <h3>Transaction ID</h3>
    <input class="textt"  type="text" name="trans_id" required>
    <h3>Amount Recieved</h3>
    <input class="textt"  type="text" name="amount_rec" required>
    <h3>Activity</h3>
    <select class="textt" required name="activity"><option value="">..Select Registration NO..</option>
    <?php
    $query1=mysqli_query($conn,"SELECT * FROM activity")or mysqli_error("Error in query!!!");
    while($row1=mysqli_fetch_array($query1))
    {
    echo "<option value='".$row1["acti_name"]."'>".$row1["acti_name"]."</option>";
    }
    ?>
    </select>

    <input class="subcourse" type="submit" name="sub" value="Submit Transaction">
  </form>
</div>
 <?php
 include "includes/footer.php";

  ?>
