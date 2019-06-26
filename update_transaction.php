<?php
include "includes/header.php";
include "includes/accountsidebar.php";
if(isset($_POST["sub"]))
{
	$regino=$_POST["regino"];
  $mode=$_POST["mode"];
  $trans_id=$_POST["trans_id"];
  $amount_rec=$_POST["amount_rec"];
  $total_amount=$_POST["total"];
    $activity=$_POST["activity"];
  $sum = ($total_amount) +( $amount_rec);

  $qury=mysqli_query($conn,"SELECT * FROM activity WHERE acti_name='$activity'");
  $rw=mysqli_fetch_array($qury);
  $t = $rw["Amount_to_pay"];
$balance = ($t) -($sum);



  $date =date("Y-m-d");

	$query=mysqli_query($conn,"UPDATE payments SET mode_payment='$mode',transaction_id='$trans_id',amount_paid='$amount_rec',total_amount='$sum',balance='$balance',date='$date' WHERE registration_no='$regino' and activity='$activity' ")or  mysqli_error("Error in query!!!");

if($query){

				echo "<script>alert('Payments Updated successful!!!');</script>";

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


  <form class="" action="update_transaction.php?pg=trans" method="post" enctype="multipart/form-data">
    <h3>Registration NO:</h3>
    <select class="textt" required name="regno"><option value="">..Select Registration NO..</option>
    <?php
    $query=mysqli_query($conn,"SELECT * FROM payments group by registration_no")or mysqli_error("Error in query!!!");
    while($row=mysqli_fetch_array($query))
    {
    echo "<option value='".$row["registration_no"]."'>".$row["registration_no"]."</option>";
    }
    ?>
    </select>
    <h3>Activity</h3>
    <select class="textt" required name="ACTIVITY"><option value="">..Select Activity..</option>
    <?php
    $queryS=mysqli_query($conn,"SELECT * FROM payments group by activity")or mysqli_error("Error in query!!!");
    while($rowS=mysqli_fetch_array($queryS))
    {
    echo "<option value='".$rowS["activity"]."'>".$rowS["activity"]."</option>";
    }
    ?>
    </select>
    <input class="" type="submit" name="search" value="Search">

    </form>
    <?php if (isset($_POST["search"])) {
      $REG = $_POST["regno"];
      $ACTIVITY = $_POST["ACTIVITY"];
    $qeru = mysqli_query($conn,"SELECT * FROM payments WHERE registration_no='$REG' and activity='$ACTIVITY' ");
    $res= mysqli_fetch_array($qeru);
     ?>
    <form class="" action="update_transaction.php?pg=trans" method="post" enctype="multipart/form-data">
<center>
<h2>UPDATE TRANSACTION</h2>
</center>
<h3>Registration NO</h3>
    <input  class="textt" type="text" name="regino" value="<?php echo  $res["registration_no"] ?>" readonly>
    <h3>Mode of Payment</h3>
  <select class="textt" name="mode">
    <option value="">....select duration...</option>
    <option value="MPESA">MPESA</option>
    <option value="CASH">CASH</option>
    <option value="BANK">BANK</option>

  </select>
    <h3>Transaction ID</h3>
    <input class="textt"  type="text" name="trans_id" value="<?php echo  $res["transaction_id"] ?>" required>
    <h3>Amount Recieved</h3>
    <input class="textt"  type="text" name="amount_rec" required>
    <h3>Total Amount</h3>
    <input class="textt"  type="text" name="total" value="<?php echo  $res["total_amount"] ?>" required readonly>
    <h3>Activity</h3>
    <input class="textt"  type="text" name="activity" value="<?php echo  $res["activity"] ?>" readonly required>

    <input class="subcourse" type="submit" name="sub" value="Submit Transaction">
  </form>
<?php } ?>
</div>
 <?php
 include "includes/footer.php";

  ?>
