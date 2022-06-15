<?php
	require_once("functions/server.php");

	if (!isset($_SESSION["membertype"]) || $_SESSION["membertype"] == "None")
	{
		$memberDisc = 0;
		return;
	}
	$query = "SELECT Discount FROM Memberships WHERE Type = :type";
	$params = array(":type" => $_SESSION["membertype"]);
	$memberDisc = runQuery($query, $params)[0]["Discount"];
?>