<?php
	session_start();

	$type = $_POST["type"] ?? "";
	$email = $_POST["email"] ?? "";

	if ($type == "" || $email == "")
	{
		header("Location: ../../Memberships.php?error=Server+error.+Please+try+again.");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "SELECT UniqueId FROM Customers WHERE Email = :email";
	$params = array(":email" => $email);
	$rows = runQuery($query, $params);
	if (count($rows) < 1)
	{
		header("Location: ../../Memberships.php?error=You+are+not+registered+as+a+customer.");
		return;
	}
	$uid = $rows[0]["UniqueId"];
	$date = date("Y-m-d");

	$query = "INSERT INTO MemberData (`CustomerUid`, `MembershipType`, `PurchaseDate`) VALUES (:uid, :type, :date)";
	$params = array(":uid" => $uid, ":type" => $type, ":date" => $date);
	$rows = runQuery($query, $params);

	$_SESSION["membertype"] = $type;
	
	header("Location: ../../Memberships.php?success=Membership+successfully+purchased");
?>