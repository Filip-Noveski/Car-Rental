<?php
	session_start();

	$first = $_POST["first"] ?? "";
	$last = $_POST["last"] ?? "";
	$uid = $_POST["uid"] ?? "";
	$phone = $_POST["phone"] ?? "";
	$email = $_POST["email"] ?? "";
	$password = $_POST["password"] ?? "";
	$conf_password = $_POST["conf-password"] ?? "";

	if ($first == "" || $last == "" || $uid == "" || $phone == "" ||
		$email == "" || $password == "" || $conf_password == "")
	{
		header("Location: ../Register.php?error=Please+provide+all+account+details");
		return;
	}

	if ($password != $conf_password)
	{
		header("Location: ../Register.php?error=Password+fields+do+not+match.+Please+confirm+your+password");
		return;
	}
	
	require_once("../functions/server.php");
	$query = "INSERT INTO Accounts (Email, Password, FirstName, LastName) VALUES (:email, :password, :first, :last)";
	$params = array(":email" => $email, ":password" => $password, ":first" => $first, ":last" => $last);
	$rows = runQuery($query, $params);
	
	$query = "INSERT INTO Customers (Email, UniqueId, Phone) VALUES (:email, :uid, :phone)";
	$params = array(":email" => $email, ":uid" => $uid, ":phone" => $phone);
	$rows = runQuery($query, $params);

	require "login.php";
?>