<?php
	session_start();

	require "../auth_admin.php";
	
	$role = $_POST["role"] ?? "";
	$uid = $_POST["uid"] ?? "";
	$email = $_POST["email"] ?? "";
	$salary = $_POST["salary"] ?? "";
	$from = $_POST["from"] ?? "";
	$until = $_POST["until"] ?? "";
	$worksAt = $_POST["works-at"] ?? "";

	if ($role == "" || $salary == "")
	{
		header("Location: ../../ManageEmployees.php?error=Please+provide+all+employee+details");
		return;
	}
	
	require_once("../../functions/server.php");
	if ($role == "admin")
	{
		if ($email = "")
		{
			header("Location: ../../ManageEmployees.php?error=Please+provide+all+employee+details");
			return;
		}
		$query = "UPDATE Admin SET Salary = :salary WHERE Email = :email";
		$params = array(":salary" => $salary, ":email" => $email);
		$rows = runQuery($query, $params);
	}
	else
	{
		if ($from == ""|| $until == ""|| $uid == ""|| $worksAt == "")
		{
			header("Location: ../../ManageEmployees.php?error=Please+provide+all+employee+details");
			return;
		}
		$query = "UPDATE Employees SET WorksFrom = :from, WorksUntil = :until, Salary = :salary, WorksAt = :branch WHERE UniqueId = :uid";
		$params = array(":from" => $from, ":until" => $until, ":salary" => $salary, ":branch" => $worksAt, ":uid" => $uid);
		$rows = runQuery($query, $params);
	}
	
	header("Location: ../../ManageEmployees.php?success=Employee+information+successfully+updated");
?>