<?php
	session_start();

	require "../auth_admin.php";

	$uid = $_POST["uid"] ?? "";
	$email = $_POST["email"] ?? "";
	$role = $_POST["role"] ?? "";

	if ($role == "" || $email == "")
	{
		header("Location: ../../ManageEmployees.php?error=Server+error.+Please+try+again.");
		return;
	}
	
	require_once("../../functions/server.php");
	
	if ($role == "admin")
	{		
		$query = "UPDATE Admin SET Works = 0 WHERE Email = :email";
		$params = array(":email" => $email);
		$rows = runQuery($query, $params);
	}
	else
	{
		$query = "UPDATE Employees SET Works = 0 WHERE UniqueId = :uid";
		$params = array(":uid" => $uid);
		$rows = runQuery($query, $params);
	}

	/*
	if ($role == "admin")
	{		
		$query = "DELETE FROM Admin WHERE Email = :email";
		$params = array(":email" => $email);
		$rows = runQuery($query, $params);
	}
	else if ($role == "sales") 
	{		
		if ($uid == "")
		{
			header("Location: ../../ManageEmployees.php?error=Server+error.+Please+try+again.");
			return;
		}
		$query = "DELETE FROM Salespeople WHERE UniqueId = :uid";
		$params = array(":uid" => $uid);
		$rows = runQuery($query, $params);

		$query = "DELETE FROM Employees WHERE UniqueId = :uid";
		$params = array(":email" => $email);
		$rows = runQuery($query, $params);
	}
	else if ($role == "maint") 
	{		
		if ($uid == "")
		{
			header("Location: ../../ManageEmployees.php?error=Server+error.+Please+try+again.");
			return;
		}
		$query = "DELETE FROM Maintenance WHERE UniqueId = :uid";
		$params = array(":uid" => $uid);
		$rows = runQuery($query, $params);

		$query = "DELETE FROM Employees WHERE UniqueId = :uid";
		$params = array(":uid" => $uid);
		$rows = runQuery($query, $params);
	}

	$query = "DELETE FROM Accounts WHERE Email = :email";
	$params = array(":email" => $email);
	$rows = runQuery($query, $params);
	*/
	header("Location: ../../ManageEmployees.php?success=Employee+successfully+deleted");
?>