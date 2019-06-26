<style>


/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width:15%;
float:left;
  z-index: 1;

  left: 0;
  background-color: navy;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
  background-color: red;
}

/* Main content */


/* Add an active class to the active dropdown button */
.active {
  background-color: green;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>


<div class="sidenav">
  <img src="logo/treasurer.png" width="100px" height="100px" style=" margin: 20px;">
<hr>

  <a href="transaction.php?pg=trans">View Transaction</a><hr>
  <?php if($_SESSION["POSITION"]=="Treasurer" or $_SESSION["LEVEL"]=="Admin"  ){ ?>
  <a href="enter_transaction.php?pg=trans">Enter Transaction</a><hr>
  <a href="update_transaction.php?pg=trans">Update Trasaction</a><hr>
<?php } ?>
  <?php
  /*
  <button class="dropdown-btn">Minutes
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="addminutes.php?pg=min">Upload Document</a><hr>

  </div>
  */
   ?>

</div>



<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
