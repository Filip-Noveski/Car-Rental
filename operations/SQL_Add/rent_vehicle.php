<?php
	session_start();

	$reg = $_POST["reg"] ?? "";
	$email = $_POST["email"] ?? "";
	$from = $_POST["start_date"] ?? "";
	$len = $_POST["length"] ?? "";

	if ($reg == "")
	{
		header("Location: ../../Index.php");
		return;
	}
	if ($email == "")
	{
		header("Location: ../../Login.php?error=Please+log+in+to+rent+vehicles");
		return;
	}
	if ($from == "" || $len == "")
	{
		header("Location: ../../Vehicle.php?reg=$reg&error=Please+provide+all+renting+details");
		return;
	}
	
	$until = strtotime($from);
	$len *= 7;
	$until = strtotime("+{$len} day", $until);
	$until = date("Y-m-d", $until);

	require_once("../../functions/server.php");

	$query = "SELECT UniqueId FROM Customers WHERE Email = :email";
	$params = array(":email" => $email);
	try 
	{
		$uid = runQuery($query, $params)[0]["UniqueId"];
	}
	catch (Exception $exception)
	{
		header("Location: ../../Vehicle.php?reg=$reg&error=You+are+not+registered+as+a+customer");
		return;
	}
	
	$query = "SELECT * FROM RentData WHERE VehiclePlate = :reg AND ((FromDate BETWEEN :from AND :until) OR (ToDate BETWEEN :from2 AND :until2))";
	$params = array(":reg" => $reg, ":from" => $from, ":until" => $until, ":from2" => $from, ":until2" => $until);
	$rows = runQuery($query, $params);

	if (count($rows) > 0)
	{
		header("Location: ../../Vehicle.php?reg=$reg&error=You+cannot+rent+this+vehicle+between+those+dates+as+it+is+reserved.+Check+&quot;Reservations&quot;+for+reserved+dates.");
		return;
	}

	$query = "INSERT INTO RentData (CustomerUid, VehiclePlate, FromDate, ToDate) VALUES (:uid, :reg, :from, :until)";
	$params = array(":uid" => $uid, ":reg" => $reg, ":from" => $from, ":until" => $until);
	runQuery($query, $params);
	
	header("Location: ../../Vehicle.php?reg=$reg&success=Vehicle+successfully+reserved");
?>