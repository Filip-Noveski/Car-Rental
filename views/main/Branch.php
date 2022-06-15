<script type="text/javascript" src="js/swapImg.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="card card-large" style="padding-top: 0">
	<?php
		echo '<h3 class="heading small-margin card-upper-heading" style="margin-top: 8px;">' . $branch["Name"] . '</h3>';
	?><!--
	<div class="card-tabs-container">
		<p class="card-tab-btn" onclick="changeTab('vehicle', 'main')">Vehicle</p><!--
		--><!--<p class="card-tab-btn" onclick="changeTab('engine', 'main')">Engine</p><!--
		--><!--<p class="card-tab-btn" onclick="changeTab('model', 'main')">Model</p>
	</div>-->

	<div class="card-large-split-upper">
		<div class="card-large-fullimg" id="img-main-full" onclick="displayFullScreen()"></div>
		<div class="card-large-upper-infoarea" id="info-vehicle-main">
			<p class="small-margin"><span class="message-info-head">Address</span><span class="message-info-text"><?= $branch["Location"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Work Hours</span><span class="message-info-text"><?= $branch["OpensAt"] ?> - <?= $branch["ClosesAt"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Vehicles Count</span><span class="message-info-text"><?= count($branch["Vehicles"]) ?></span></p>
			
			<!--<?php require("views/partial/VehiclePricingAndRent.php"); ?>-->
		</div>
		<!--
		<div class="card-large-upper-infoarea" id="info-engine-main" style="display: none">
			<p class="small-margin"><span class="message-info-head">Engine Name</span><span class="message-info-text"><?= $vehicle["Engine"]["Name"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Manufacturer</span><span class="message-info-text"><?= $vehicle["Engine"]["BuiltBy"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Displacement</span><span class="message-info-text"><?= $vehicle["Engine"]["Displacement"] ?> l</span></p>
			<p class="small-margin"><span class="message-info-head">Power</span><span class="message-info-text"><?= $vehicle["Engine"]["Power"] ?> kW</span></p>
			<p class="small-margin"><span class="message-info-head">Torque</span><span class="message-info-text"><?= $vehicle["Engine"]["Torque"] ?> N&#xb7;m</span></p>
			<p class="small-margin"><span class="message-info-head">Fuel Type</span><span class="message-info-text"><?= $vehicle["Engine"]["FuelType"] ?></span></p>
		
			<?php require("views/partial/VehiclePricingAndRent.php"); ?>
		</div>

		<div class="card-large-upper-infoarea" id="info-model-main" style="display: none">
			<p class="small-margin"><span class="message-info-head">Manufacturer</span><span class="message-info-text"><?= $vehicle["Manufacturer"]["Name"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Group</span><span class="message-info-text"><?= $vehicle["Group"]["Name"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Engine</span><span class="message-info-text"><?= $vehicle["Engine"]["Name"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Body</span><span class="message-info-text"><?= $vehicle["Body"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Doors Count</span><span class="message-info-text"><?= $vehicle["DoorsCount"] ?></span></p>
			<p class="small-margin"><span class="message-info-head">Seats Count</span><span class="message-info-text"><?= $vehicle["SeatsCount"] ?></span></p>
		
			<?php require("views/partial/VehiclePricingAndRent.php"); ?>
		</div>-->
	</div>

	<div class="card-large-split-lower">
		<?php
			require("views/partial/GenerateBranchMapImgSpecific.php");
			$j = 0;
			foreach ($branch["Vehicles"] as $vehicle)
			{
				$images = glob("images/images/vehicles/{$vehicle["RegPlate"]}/*");
				$image = $images[0];
				echo '<div class="card-large-smallimg" id="smallimg-main-' . $j . '" onclick="swapImg(\'img-main-full\', \'' . $image . '\')" style="background-image: url(\'' . $image . '\')"></div>';
				$j++;
			}
		?>
		<script type="text/javascript"> 
			document.getElementById("smallimg-main-map").click(); 
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

<h3 class="heading">Vehicles at <?= $branch["Name"] ?></h3>
<?php
	require_once("views/partial/Vehicles.php");
?>