<?php
	session_start();
	if (!isset($_SESSION["useremail"]))
	{
		header("Location: Login.php");
		return;
	}
?>