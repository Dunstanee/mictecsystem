<?php
include "includes/header.php";


?>

 <style>


#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 40%;
  margin-left: 13%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}


#myTable {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;

  border: 1;
  border-color: red;
}

#myTable th{
	padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: red;
  color: white;

}

#myTable th, #myTable td {
	border: 1px solid #ddd;
  padding: 2px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}
#myTable tr.header{
	position: sticky;
	margin-top: 0px;

}
#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
#myTable tr:nth-child(even){background-color: Aquamarine ;}
#myTable tr:nth-child(odd){background-color: Aqua  ;}
#myTable tr:hover {background-color: #ddd;}
.results{
  overflow: hidden;
  overflow-y: scroll;
  height: 500px;
  width: 100%;

}
</style>


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Registration.." title="Type in a regno">

<div class="results">

<table id="myTable" border="1px" >

  <tr class="header">
		<th>S/N</th>
		<th>NAME</th>
		<th>REGISTRATION NUMBER</th>
		<th>GENDER</th>
		<th>COURSE</th>
		<th>ADDRESS</th>
		<th>EMAIL</th>
		<th>MOBILE NO:</th>
		<th>Profile PHOTO</th>

  </tr>
  <?php

	$query0 = mysqli_query($conn,"SELECT * FROM members");
  $i=1;
  while($row0 =mysqli_fetch_array($query0)){

?>
  <tr>
    <td><?php echo $i ?></td>

		<td><?php echo $row0["name"];?></td>
		<td><?php echo $row0["registration_no"];?></td>
		<td><?php echo $row0["gender"];?></td>
		<td><?php echo $row0["course"];?></td>
		<td><?php echo $row0["address"];?></td>
		<td><?php echo $row0["email"];?></td>
		<td><?php echo $row0["mobile_no"];?></td>
		<td><img width="50px" src="<?php echo $row0["photo"];?>"></td>
  </tr>
<?php
$i++;
}

 ?>
</table>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
 <?php
 include "includes/footer.php";
  ?>
