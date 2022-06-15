<?php
	require_once("functions/server.php");
	if (!isset($_SESSION["customer"]) || $_SESSION["customer"] == 1)
		$query = "SELECT * FROM Branch LEFT OUTER JOIN (SELECT BranchId, COUNT(BranchId) AS VehCount FROM Vehicles WHERE Valid = 1 GROUP BY BranchId) AS v ON Branch.Id = v.BranchId WHERE Valid = 1 AND VehCount > 0";
	else
		$query = "SELECT * FROM Branch LEFT OUTER JOIN (SELECT BranchId, COUNT(BranchId) AS VehCount FROM Vehicles WHERE Valid = 1 GROUP BY BranchId) AS v ON Branch.Id = v.BranchId WHERE Valid = 1";
	$params = array();
	$branches = runQuery($query, $params);

	for ($i = 0; $i <= count($branches) - 1; $i++)
	{
		$query = "SELECT * FROM Vehicles WHERE BranchId = :id AND Valid = 1";
		$params = array(":id" => $branches[$i]["Id"]);
		$branches[$i]["Vehicles"] = runQuery($query, $params);
	}
?>