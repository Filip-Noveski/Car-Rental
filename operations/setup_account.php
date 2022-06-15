<?php
	session_start();

	$email = $_POST["email"] ?? "";
	$password = $_POST["password"] ?? "";
	$confPassword = $_POST["conf-password"] ?? "";

	if ($password == "" || $confPassword == "")
	{
		header("Location: ../Login.php?error=Please+provide+a+new+password");
	}

	if ($password != $confPassword)
	{
		header("Location: ../Login.php?error=The+password+fields+do+not+match");
	}

	require_once("../functions/server.php");
	$query = "UPDATE Accounts SET password = :password, enabled = 1 WHERE email = :email";
	$params = array(":email" => $email, ":password" => $password);
	$rows = runQuery($query, $params);
	require "login.php";
?>