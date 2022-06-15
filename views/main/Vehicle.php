<script type="text/javascript" src="js/swapImg.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="card card-large" style="padding-top: 0">
	<?php
		$vehicleName = "{$vehicle["ModelYear"]} {$vehicle["Make"]} {$vehicle["Model"]} {$vehicle["Generation"]} {$vehicle["Submodel"]}";
		$logoPath = glob("images/images/car_makes/" . $vehicle["Make"] . ".*")[0];
		$logo = '<img class="card-logo" src="' . $logoPath . '" />';
		echo '<h3 class="heading small-margin card-upper-heading" style="margin-top: 8px;">' . $logo . $vehicleName . '</h3>';
	?>
	<div class="card-tabs-container">
		<p class="card-tab-btn" onclick="changeTab('vehicle', 'main')">Vehicle</p><!--
		--><p class="card-tab-btn" onclick="changeTab('engine', 'main')">Engine</p><!--
		--><p class="card-tab-btn" onclick="changeTab('model', 'main')">Model</p><!--
		--><p class="card-tab-btn" onclick="changeTab('branch', 'main')">Branch</p><!--
		--><p class="card-tab-btn" onclick="changeTab('rents', 'main')">Reservations</p>
	</div>

	<div class="card-large-split-upper">
		<div class="card-large-fullimg" id="img-main-full" onclick="displayFullScreen()"></div>
		<div class="card-large-upper-infoarea" id="info-vehicle-main">
			<p class="small-margin"><span class="message-info-head">Registration</span><span class="message-info-text"><?= $vehicle["RegPlate"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Colour</span><span class="message-info-text"><?= $vehicle["Colour"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Engine</span><span class="message-info-text"><?= $vehicle["Engine"]["Name"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Transmission</span><span class="message-info-text"><?= $vehicle["Transmission"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Location</span><span class="message-info-text"><?= "{$vehicle["Name"]}; {$vehicle["Location"]}" ?></span></p>
			<p class="small-margin"><span class="message-info-head">Price</span><span class="message-info-text">&euro; <?= $vehicle["Price"] ?> / week</span></p>
			
			<?php require("views/partial/VehiclePricingAndRent.php"); ?>
		</div>

		<div class="card-large-upper-infoarea" id="info-engine-main" style="display: none">
			<p class="small-margin"><span class="message-info-head">Engine Name</span><span class="message-info-text"><?= $vehicle["Engine"]["Name"] ?></span></p>
			<p class="small-margin">
				<span class="message-info-head">Manufacturer</span><!--
				--><span class="message-info-text">
					<?= $vehicle["Engine"]["BuiltBy"] ?>
					<img class="flag" src="images/flags/<?= $vehicle["Engine"]["Country"] ?>.jpg" />
				</span>
			</p>
			<p class="small-margin"><span class="message-info-head">Displacement</span><!--
				--><span class="message-info-text"><?= $vehicle["Engine"]["Displacement"] > 0 ? ($vehicle["Engine"]["Displacement"] . " l") : "/" ?></span>
			</p>
			<p class="small-margin"><span class="message-info-head">Power</span><span class="message-info-text"><?= $vehicle["Engine"]["Power"] ?> kW</span></p>
			<p class="small-margin"><span class="message-info-head">Torque</span><span class="message-info-text"><?= $vehicle["Engine"]["Torque"] ?> N&#xb7;m</span></p>
			<p class="small-margin"><span class="message-info-head">Fuel Type</span><span class="message-info-text"><?= $vehicle["Engine"]["FuelType"] ?></span></p>
		
			<?php require("views/partial/VehiclePricingAndRent.php"); ?>
		</div>

		<div class="card-large-upper-infoarea" id="info-model-main" style="display: none">
			<p class="small-margin">
				<span class="message-info-head">Manufacturer</span><!--
				--><span class="message-info-text">
					<?= $vehicle["Manufacturer"]["Name"] ?>
					<img class="flag" src="images/flags/<?= $vehicle["Manufacturer"]["Country"] ?>.jpg" />
				</span>
			</p>
			<p class="small-margin">
				<span class="message-info-head">Group</span><!--
				--><span class="message-info-text">
					<?= $vehicle["Group"]["Name"] ?>
					<img class="flag" src="images/flags/<?= $vehicle["Group"]["Country"] ?>.jpg" />
				</span>
			</p>
			<p class="small-margin"><span class="message-info-head">Engine</span><span class="message-info-text"><?= $vehicle["Engine"]["Name"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Body</span><span class="message-info-text"><?= $vehicle["Body"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Doors Count</span><span class="message-info-text"><?= $vehicle["DoorsCount"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Seats Count</span><span class="message-info-text"><?= $vehicle["SeatsCount"] ?></span></p>
		
			<?php require("views/partial/VehiclePricingAndRent.php"); ?>
		</div>

		<div class="card-large-upper-infoarea" id="info-branch-main" style="display: none">
			<div class="card-landscape-fullimg" id="branch-map"></div>
			<script type="text/javascript"> putMap('branch-map', <?= $vehicle["CoordsX"] ?>, <?= $vehicle["CoordsY"] ?>); </script>
			<div style="display: inline-block; max-width: calc(100% - 300px); vertical-align: top">
				<p class="small-margin"><span class="message-info-text" style="width: 100%"><?= $vehicle["Name"] ?></span></p>
				<p class="small-margin"><span class="message-info-text" style="width: 100%"><?= $vehicle["Location"] ?></span></p>
				<p class="small-margin"><span class="message-info-text" style="width: 100%"><?= $vehicle["OpensAt"] ?> - <?= $vehicle["ClosesAt"] ?></span></p>
			</div>
		</div>

		<div class="card-large-upper-infoarea" id="info-rents-main" style="display: none">
			<?php
				if (count($vehicle["RentData"]) == 0)
				{
					echo '<p class="small-margin" style="color: #20FF20"><span class="message-info-head">Info</span><span class="message-info-text">This vehicle does not have future reservations</span></p>';
				}
				else
				{
					for ($i = 0; $i <= min(count($vehicle["RentData"]) - 1, 5); $i++)
					{
						require_once("operations/SQL_Fetch/fetch_customer_uid.php");
						if ($vehicle["RentData"][$i]["CustomerUid"] == $uid)
							echo '<p class="small-margin" style="color: #20FF20"><span class="message-info-head">Your Reserv.</span><span class="message-info-text">' . date_format(date_create($vehicle["RentData"][$i]["FromDate"]), "d.m.Y") . ' - ' . date_format(date_create($vehicle["RentData"][$i]["ToDate"]), "d.m.Y") . '</span></p>';
						else if ($vehicle["RentData"][$i]["FromDate"] < date("Y-m-d") && $vehicle["RentData"][$i]["ToDate"] > date("Y-m-d"))
							echo '<p class="small-margin" style="color: #FF2020"><span class="message-info-head">Current Rent</span><span class="message-info-text">' . date_format(date_create($vehicle["RentData"][$i]["FromDate"]), "d.m.Y") . ' - ' . date_format(date_create($vehicle["RentData"][$i]["ToDate"]), "d.m.Y") . '</span></p>';
						else
							echo '<p class="small-margin"><span class="message-info-head">Reservation</span><span class="message-info-text">' . date_format(date_create($vehicle["RentData"][$i]["FromDate"]), "d.m.Y") . ' - ' . date_format(date_create($vehicle["RentData"][$i]["ToDate"]), "d.m.Y") . '</span></p>';
					}
				}
			?>

			<?php require("views/partial/VehiclePricingAndRent.php"); ?>
		</div>
	</div>
	<div class="card-large-split-lower">
		<?php
			$images = glob("images/images/vehicles/{$vehicle["RegPlate"]}/*");
			for ($j = 0; $j <= count($images) - 1; $j++)
			{
				$image = $images[$j];
				echo '<div class="card-large-smallimg" id="smallimg-main-' . $j . '" onclick="swapImg(\'img-main-full\', \'' . $image . '\'); displayed = ' . $j . '" style="background-image: url(\'' . $image . '\')"></div>';
			}
		?>
		<script type="text/javascript"> 
			document.getElementById("smallimg-main-0").click(); 
		</script>
	</div>
</div>

<div class="popup-background" id="img-popup">
	<div class="popup-image" id="img-popup-img">
		<p class="popup-close" onclick="document.getElementById('img-popup').style.display = 'none';">X</p>
		<p class="popup-change" onclick="swapFullScreen('prev')" style="left: 0%;">&lang;</p>
		<p class="popup-change" onclick="swapFullScreen('next')" style="left: 94%;">&rang;</p>
	</div>
</div>

<div class="popup-background" id="prompt-rent">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Add/rent_vehicle.php">
			<input type="hidden" id="reg" name="reg" value="<?= $vehicle["RegPlate"] ?>" />
			<input type="hidden" id="email" name="email" value="<?= $_SESSION["useremail"] ?? "" ?>" />
			<h3 class="heading">Rent Vehicle <?= isset($_SESSION["useremail"]) ? "" : "<span class=\"small-info\">Login to rent</span>" ?></h3>
			<p class="form-input-field">
				<label class="form-input-label" for="start_date">Rent from:</label><br />
				<input class="form-input" type="date" name="start_date" id="start_date" min="<?= date("Y-m-d") ?>" max="<?= date('Y-m-d', strtotime('+1 years')) ?>" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="length">Renting time [weeks]:</label><br />
				<input class="form-input" type="number" name="length" min="1" id="length" onchange="updatePrice('<?= $disc ?? $vehicle["Price"] ?>')" />
			</p>
			<p class="heading">Total to pay: &euro; <span id="total-price"></span></p>
			<input type="submit" id="submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Rent vehicle</a>
			<a class="btn" href="#" onclick="document.getElementById('prompt-rent').style.display = 'none'; return false;">Cancel</a>
		</form>
	</div>
</div>


<?php
	if ($error != "")
		echo "<p class=\"error\">$error</p>";
	if ($success != "")
		echo "<p class=\"success\">$success</p>";
?>

<h3 class="heading">Other vehicles</h3>
<?php
	require_once("views/partial/Vehicles.php");
?>