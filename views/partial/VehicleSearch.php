<form method="get" action="Vehicles.php">
	<p class="form-input-field" style="width: 15%; display: inline-block;">
		<label class="form-input-label" for="branch">Branch:</label><br />
		<input class="form-input" type="text" name="branch" id="branch" value="<?= $_GET["branch"] ?? '' ?>" />
	</p>
	<p class="form-input-field" style="width: 15%; display: inline-block;">
		<label class="form-input-label" for="brand">Brand:</label><br />
		<input class="form-input" type="text" name="brand" id="brand" value="<?= $_GET["brand"] ?? '' ?>" />
	</p>
	<p class="form-input-field" style="width: 15%; display: inline-block;">
		<label class="form-input-label" for="model">Model:</label><br />
		<input class="form-input" type="text" name="model" id="model" value="<?= $_GET["model"] ?? '' ?>" />
	</p>
	<p class="form-input-field" style="width: 15%; display: inline-block;">
		<label class="form-input-label" for="trans">Transmission:</label><br />
		<input class="form-input" type="text" name="trans" id="trans" value="<?= $_GET["trans"] ?? '' ?>" />
	</p>
	<p class="form-input-field" style="width: 15%; display: inline-block;">
		<label class="form-input-label" for="fuel">Fuel:</label><br />
		<input class="form-input" type="text" name="fuel" id="fuel" value="<?= $_GET["fuel"] ?? '' ?>" />
	</p>
	<p class="form-input-field" style="width: 15%; display: inline-block;">
		<label class="form-input-label" for="body">Body:</label><br />
		<input class="form-input" type="text" name="body" id="body" value="<?= $_GET["body"] ?? '' ?>" />
	</p>
	<input type="submit" id="login" style="display: none" />
	<a class="btn" href="#" onclick="document.getElementById('login').click(); return false;">Search</a>
</form>