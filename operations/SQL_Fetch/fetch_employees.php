<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM Accounts acc, Admins ad WHERE acc.Email = ad.Email AND ad.Works = 1 ORDER BY LastName, FirstName";
	$params = array();
	$admins = runQuery($query, $params);
	
	$query = "SELECT * FROM Accounts acc, Salespeople sp, Employees emp WHERE acc.Email = sp.Email AND sp.UniqueId = emp.UniqueId AND emp.Works = 1 ORDER BY LastName, FirstName";
	$params = array();
	$salespeople = runQuery($query, $params);
	
	$query = "SELECT * FROM Accounts acc, Maintenance mt, Employees emp WHERE acc.Email = mt.Email and mt.UniqueId = emp.UniqueId AND emp.Works = 1 ORDER BY LastName, FirstName";
	$params = array();
	$maintenance = runQuery($query, $params);

	require_once "operations/SQL_Fetch/fetch_branches.php";
?>