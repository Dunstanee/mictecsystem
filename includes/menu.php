<style>


.navbar {
height: 50px;
  background-color: Navy;
  padding: 20px;
}

.navbar a {
  float: left;
  font-size: 20px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;

}

.dropdown .dropbtn {
  font-size: 20px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<div class="navbar">

  <a href="index.php?pg=hm">Home</a>


  <?php
if (!isset($_SESSION["ID"])) {

   ?>
   <a href="registration.php?pg=rg">Registration</a>
   <a href="login.php?pg=lg">Login</a>
<?php
}
else {

 ?>


    <?php if ($_SESSION["LEVEL"]=="Admin") {
  ?>
  <a href="news.php?pg=news">News</a>
    <a href="profile.php?pg=prof">Profile</a>
  <a href="responses.php?pg=resps">View Response</a>
<a href="authorization.php?pg=authorize">Officials</a>
<a href="account.php?pg=trans">Account</a>

  <div class="dropdown">
    <button class="dropbtn">Posts
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="postview.php?pg=posti">View Posts</a>
      <a href="addpost.php?pg=post">Add Posts</a>

    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Course
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="course_view.php?pg=cos">View Courses</a>
      <a href="course.php?pg=cos">Add Course</a>

    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Activity
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="events.php?pg=evs">Events</a>
      <a href="add_event.php?pg=ev">Add Event</a>
    </div>
  </div>

<a href="minutes.php?pg=min">Minutes</a>
<a href="members.php?pg=mem">Members</a>
<div class="dropdown">
  <button class="dropbtn">Approval
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content">
    <a href="approvals.php?pg=approve">Incoming Approval</a>
    <a href="approved.php?pg=approve">Approved</a>
  </div>
</div>

<a href="logout.php?pg=lgout">Logout</a>
<?php }
else  if ($_SESSION["LEVEL"]=="Member") { ?>
<a href="news.php?pg=news">News</a>
<a href="profile.php?pg=prof">Profile</a>
  <a href="member_user.php?pg=mem">Members</a>
    <a href="transaction_user.php?pg=tranU">Transaction</a>
    <div class="dropdown">
      <button class="dropbtn">Activity
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="events.php?pg=evs">Events</a>
      </div>
    </div>
  <a href="contact_users.php?pg=cont">Contact Us</a>

  <a href="logout.php?pg=lgout">Logout</a>
<?php }else if($_SESSION["LEVEL"]=="Official"){

  ?>

  <a href="news.php?pg=news">News</a>
    <a href="profile.php?pg=prof">Profile</a>
  <a href="responses.php?pg=resps">View Response</a>
<a href="authorization.php?pg=authorize">Officials</a>
<a href="account.php?pg=trans">Account</a>

  <div class="dropdown">
    <button class="dropbtn">Posts
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="postview.php?pg=posti">View Posts</a>
      <a href="addpost.php?pg=post">Add Posts</a>

    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Course
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="course_view.php?pg=cos">View Courses</a>
    </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Activity
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="events.php?pg=evs">Events</a>
      <?php if($_SESSION["POSITION"]=="Organizing Secretary"){ ?>
      <a href="add_event.php?pg=ev">Add Event</a>
    <?php } ?>
    </div>
  </div>

<a href="minutes.php?pg=min">Minutes</a>
<a href="members.php?pg=mem">Members</a>
<a href="logout.php?pg=lgout">Logout</a>


  <?php
}

}

?>

</div>
