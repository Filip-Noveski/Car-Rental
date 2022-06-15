<?php
	require_once("functions/server.php");

	require_once("operations/SQL_Fetch/fetch_vehicles_merged.php");

	for ($i = 0; $i <= count($vehicles) - 1; $i++)
	{
		$query = "SELECT * FROM ServiceData WHERE VehiclePlate = :reg";
		$params = array(":reg" => $vehicles[$i]["RegPlate"]);
		$vehicles[$i]["ServiceData"] = runQuery($query, $params);
		
		for ($j = 0; $j <= count($vehicles[$i]["ServiceData"]) - 1; $j++)
		{
			$query = "SELECT * FROM ServiceCompanies WHERE Id = :id";
			$params = array(":id" => $vehicles[$i]["ServiceData"][$j]["ServiceId"]);
			$vehicles[$i]["ServiceData"][$j]["ServiceCompany"] = runQuery($query, $params)[0];
		}
	}
?>