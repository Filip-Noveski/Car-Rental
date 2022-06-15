<?php
	session_start();

	$email = $_POST["email"] ?? "";
	$password = $_POST["password"] ?? "";

	if ($email == "" || $password == "")
	{
		header("Location: ../Login.php?error=Please+provide+log+in+credentials");
	}

	require_once("../functions/server.php");
	$query = "SELECT * FROM Accounts WHERE email = :email AND password = :password";
	$params = array(":email" => $email, ":password" => $password);
	$rows = runQuery($query, $params);
	if (isset($rows[0]))
	{
		$_SESSION["useremail"] = $email;
		$_SESSION["username"] = $rows[0]["FirstName"] . " " . $rows[0]["LastName"];
		$_SESSION["admin"] = isAdmin($email);
		$_SESSION["salesperson"] = isSalesperson($email);
		$_SESSION["maintenance"] = isMaintenance($email);
		$_SESSION["customer"] = isCustomer($email);
		$_SESSION["membertype"] = getMemberType($email);
		if ($rows[0]["Enabled"] == 1)
			header("Location: ../Index.php");
		else
			header("Location: ../SetupAccount.php");
	}
	else
	{
		header("Location: ../Login.php?error=Incorrect+log+in+credentials");
	}
?>