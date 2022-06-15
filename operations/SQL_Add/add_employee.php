<?php
	session_start();

	$role = $_POST["role"] ?? "";
	$first = $_POST["first"] ?? "";
	$last = $_POST["last"] ?? "";
	$uid = $_POST["uid"] ?? "";
	$email = $_POST["email"] ?? "";
	$phone = $_POST["phone"] ?? "";
	$salary = $_POST["salary"] ?? "";
	$dob = $_POST["dob"] ?? "";
	$from = $_POST["from"] ?? "";
	$until = $_POST["until"] ?? "";
	$worksAt = $_POST["works-at"] ?? "";
	$table = $role == "sales" ? "Salespeople" : "Maintenance";

	if ($role = "" || $first == "" || $last == "" || $uid == "" || $email == "" ||
		$phone == "" || $salary == "" || $dob == "" || $from == "" || $until == "" || $worksAt == "")
	{
		header("Location: ../../ManageEmployees.php?error=Please+provide+all+employee+details");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "INSERT INTO Accounts (Email, Password, FirstName, LastName, Enabled) VALUES (:email, :password, :first, :last, :enabled)";
	$params = array(":email" => $email, ":password" => "TempPass#1", ":first" => $first, ":last" => $last, ":enabled" => false);
	$rows = runQuery($query, $params);
	
	if ($role == "admin")
	{
		$query = "INSERT INTO Admins (Email, Salary, Phone, DateOfBirth) VALUES (:email, :salary, :phone, :dob)";
		$params = array("email" => $email, ":salary" => $salary, ":phone" => $phone, ":dob" => $dob);
		$rows = runQuery($query, $params);
	}
	else
	{
		$query = "INSERT INTO Employees (UniqueId, WorksAt, Phone, Salary, DateOfBirth, WorksFrom, WorksUntil) VALUES (:uid, :worksAt, :phone, :salary, :dob, :from, :until)";
		$params = array(":uid" => $uid, ":worksAt" => $worksAt, ":phone" => $phone, ":salary" => $salary, ":dob" => $dob, ":from" => $from, ":until" => $until);
		$rows = runQuery($query, $params);

		$query = "INSERT INTO $table (UniqueId, Email) VALUES (:uid, :email)";
		$params = array(":uid" => $uid, "email" => $email);
		$rows = runQuery($query, $params);
	}

	header("Location: ../../ManageEmployees.php?success=Employee+successfully+added");
?>