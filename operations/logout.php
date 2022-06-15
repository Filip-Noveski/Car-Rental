<?php
	session_start();
	
	unset($_SESSION["useremail"]);
	unset($_SESSION["username"]);
	unset($_SESSION["admin"]);
	unset($_SESSION["salesperson"]);
	unset($_SESSION["maintenance"]);
	unset($_SESSION["customer"]);
	unset($_SESSION["membertype"]);

	header("Location: ../Index.php");
?>