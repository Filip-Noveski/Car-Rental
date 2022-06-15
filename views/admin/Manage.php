<h2 class="heading"><?= $pageName ?></h2>

<div class="card-flex-container">
	<div class="card-flex">
		<div class="card card-portrait" onclick="location.href = 'ManageBranches.php';">
			<div class="card-portrait-largeimg" style="background: url('<?= $root ?>/images/icons/manage_branches.svg')"></div>
			<h3 class="card-heading heading" style="text-align: center">Manage Branches</h3>
		</div>
		<div class="card card-portrait" onclick="location.href = 'ManageEmployees.php';">
			<div class="card-portrait-largeimg" style="background: url('<?= $root ?>/images/icons/manage_employees.svg')"></div>
			<h3 class="card-heading heading" style="text-align: center">Manage Employees</h3>
		</div>
		<div class="card card-portrait" onclick="location.href = 'ManageVehicles.php';">
			<div class="card-portrait-largeimg" style="background: url('<?= $root ?>/images/icons/car.svg')"></div>
			<h3 class="card-heading heading" style="text-align: center">Manage Vehicles</h3>
		</div>
		<div class="card card-portrait" onclick="location.href = 'ManageServiceCompanies.php';">
			<div class="card-portrait-largeimg" style="background: url('<?= $root ?>/images/icons/manage_service_companies.svg')"></div>
			<h3 class="card-heading heading" style="text-align: center">Manage Service Companies</h3>
		</div>
	</div>
	<div class="card-flex">
		<div class="card card-portrait" onclick="location.href = 'ManageCarGroups.php';">
			<div class="card-portrait-largeimg" style="background: url('<?= $root ?>/images/icons/manage_car_groups.svg')"></div>
			<h3 class="card-heading heading" style="text-align: center">Manage Car Groups</h3>
		</div>
		<div class="card card-portrait" onclick="location.href = 'ManageCarBrands.php';">
			<div class="card-portrait-largeimg" style="background: url('<?= $root ?>/images/icons/manage_car_brands.svg')"></div>
			<h3 class="card-heading heading" style="text-align: center">Manage Car Brands</h3>
		</div>
		<div class="card card-portrait" onclick="location.href = 'ManageCarEngines.php';">
			<div class="card-portrait-largeimg" style="background: url('<?= $root ?>/images/icons/manage_car_engines.svg')"></div>
			<h3 class="card-heading heading" style="text-align: center">Manage Car Engines</h3>
		</div>
		<div class="card card-portrait" onclick="location.href = 'ManageCarModels.php';">
			<div class="card-portrait-largeimg" style="background: url('<?= $root ?>/images/icons/manage_car_models.svg')"></div>
			<h3 class="card-heading heading" style="text-align: center">Manage Car Models</h3>
		</div>
	</div>
	<div class="card-flex">
		<div class="card card-portrait" onclick="location.href = 'ManageMemberships.php';">
			<div class="card-portrait-largeimg" style="background: url('<?= $root ?>/images/icons/manage_memberships.svg')"></div>
			<h3 class="card-heading heading" style="text-align: center">Manage Memberships</h3>
		</div>
		<div class="card card-portrait" onclick="location.href = 'ViewCustomers.php';">
			<div class="card-portrait-largeimg" style="background: url('<?= $root ?>/images/icons/manage_employees.svg')"></div>
			<h3 class="card-heading heading" style="text-align: center">View Customers</h3>
		</div>
		<div class="card card-portrait" onclick="" style="visibility: hidden">
		</div>
		<div class="card card-portrait" onclick="" style="visibility: hidden">
		</div>
	</div>
</div>