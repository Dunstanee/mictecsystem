<?php
session_start();
        unset($_SESSION["ID"]);
		unset($_SESSION["NAME"]);
		unset($_SESSION["USER"]);
		unset($_SESSION["EMAIL"]);
		unset($_SESSION["TYPE_ID"]);

		echo "<script>alert('You are Logged out!!');location.href='index.php?pg=hm';</script>";

?>
