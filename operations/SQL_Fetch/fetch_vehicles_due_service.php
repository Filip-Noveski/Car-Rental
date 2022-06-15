<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM Vehicles v LEFT OUTER JOIN (SELECT DISTINCT(VehiclePlate), `Date` FROM ServiceData ORDER BY `Date` DESC) AS sd ON v.RegPlate = sd.VehiclePlate WHERE v.Valid = 1 AND (sd.Date IS NULL OR DATE_ADD(sd.Date, INTERVAL 350 DAY) < CURDATE())";
	$params = array();
	$vehicles = runQuery($query, $params);
	for ($i = 0; $i <= count($vehicles) - 1; $i++)
	{
		$query = "SELECT * FROM ServiceCompanies WHERE Id = :id";
		$params = array(":id" => $vehicles[$i]["PreferredService"]);
		$vehicles[$i]["PreferredService"] = runQuery($query, $params)[0];

		$query = "SELECT * FROM Branch WHERE Id = :id";
		$params = array(":id" => $vehicles[$i]["BranchId"]);
		$vehicles[$i]["Branch"] = runQuery($query, $params)[0];
	}
	require_once("operations/SQL_Fetch/fetch_ser_co.php");
?>