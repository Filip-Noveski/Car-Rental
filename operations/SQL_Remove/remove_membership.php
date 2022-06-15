<?php
	session_start();

	require "../auth_admin.php";

	$type = $_POST["type"] ?? "";

	if ($id == "")
	{
		header("Location: ../../ManageMemberships.php?error=Server+error.+Please+try+again.");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "UPDATE Memberships SET Valid = 0 WHERE Type = :type";
	$params = array(":type" => $type);
	$rows = runQuery($query, $params);
	
	header("Location: ../../ManageMemberships.php?success=Membership+successfully+deleted");
?>