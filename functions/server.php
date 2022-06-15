<?php
	function runQuery($query, array $params)
	{
		require dirname(__FILE__) . "/../pdo.php";
		$statement = $pdo->prepare($query);
		$statement->execute($params);
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	function isAdmin($email)
	{
		$query = "SELECT * FROM Admins WHERE email = :email";
		$params = array(":email" => $email);
		return isset(runQuery($query, $params)[0]);
	}

	function isSalesperson($email)
	{
		$query = "SELECT * FROM Salespeople WHERE email = :email";
		$params = array(":email" => $email);
		return isset(runQuery($query, $params)[0]);
	}

	function isMaintenance($email)
	{
		$query = "SELECT * FROM Maintenance WHERE email = :email";
		$params = array(":email" => $email);
		return isset(runQuery($query, $params)[0]);
	}

	function isCustomer($email)
	{
		$query = "SELECT * FROM Customers WHERE email = :email";
		$params = array(":email" => $email);
		return isset(runQuery($query, $params)[0]);
	}

	function getMemberType($email)
	{
		$query = "SELECT UniqueId FROM Customers WHERE email = :email";
		$params = array(":email" => $email);
		$row = runQuery($query, $params);
		if (count($row) < 1)
		{
			return "None";
		}
		$uid = $row[0]["UniqueId"];

		$query = "SELECT * FROM MemberData WHERE CustomerUid = :uid ORDER BY PurchaseDate DESC LIMIT 1";
		$params = array(":uid" => $uid);
		$purchaseData = runQuery($query, $params);
		if (count($purchaseData) < 1)
		{
			return "None";
		}

		$query = "SELECT * FROM Memberships WHERE Type = :type";
		$params = array(":type" => $purchaseData[0]["MembershipType"]);
		$membership = runQuery($query, $params);

		$buyDateStr = $purchaseData[0]["PurchaseDate"];
		$buyDate = new DateTime($buyDateStr);
		$expireDate = new DateTime($buyDateStr);
		$m = $membership[0]["Duration"];
		$expireDate->modify("+$m months");
		if ($expireDate > date('Y-m-d'))
		{
			return $purchaseData[0]["MembershipType"];
		}
		return "None";
	}
?>