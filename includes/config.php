<?php
$host ="127.0.0.1";
$dbpass ="";
$dbuser ="root";
$db="mictecdb";
$conn= mysqli_connect($host,$dbuser,$dbpass,$db);
if(!mysqli_connect($host,$dbuser,$dbpass,$db))
{
	exit("Error:Database connection not established!!");
}

?>
