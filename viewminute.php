<?php
include "includes/header.php";
include "includes/minutesidebar.php";


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
  border-collapse: collapse;
  width: 100%;

  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
.results{
  overflow: hidden;
  overflow-y: scroll;
  height: 300px;
  width: 80%;
  margin-left: 13%;
}
</style>
</head>
<body>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<div class="results">
<table id="myTable" border="1px" >

  <tr class="header">
    <th style="width:10%;">S/N</th>
    <th style="width:20%;">DOCUMENT NAME</th>
    <th style="width:40%;">DATE</th>
    <th style="width:40%;">ACTION</th>
  </tr>
  <?php
  $i = 1;
  $query = mysqli_query($conn, "SELECT * FROM documents ");
  while($row= mysqli_fetch_array($query)){
    $id = $row["id"];
    $name = $row["name"];
    $path = $row["path"];
    $date = $row["date"];
?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $name ?></td>
    <td><?php echo $date ?></td>
    <td> <?php echo "<a style='text-decoration:none;' href='download.php?pg=dn&dow=$path'> download</a>" ?></td>

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
    td = tr[i].getElementsByTagName("td")[1];
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
