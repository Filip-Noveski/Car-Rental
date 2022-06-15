<img class="home-logo" src="<?= $root ?>/images/icons/logo_colour.svg" id="home-img" />

<?php 
	if (!isset($_SESSION["useremail"]))
	{
		require("views/partial/HomeCardsGuest.php");
	}
	else if ($_SESSION["admin"] == 1)
	{
		require("views/partial/HomeCardsAdmin.php");
	}
	else if ($_SESSION["salesperson"] == 1)
	{
		require("views/partial/HomeCardsSales.php");
	}
	else if ($_SESSION["maintenance"] == 1)
	{
		require("views/partial/HomeCardsMaint.php");
	}
	else if ($_SESSION["customer"] == 1)
	{
		require("views/partial/HomeCardsLogged.php");
	}
?>

<h3 class="heading">Branches:</h3>
<?php
	require("views/partial/BranchMap.php");
?>

<h3 class="heading">Available Vehicles:</h3>
<?php
	require("views/partial/VehiclesLess.php");
?>