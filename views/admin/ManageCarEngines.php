<script type="text/javascript" src="js/manage.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="db-table-container">
	<table class="db-table">
		<tr class="db-table-row">
			<th class="db-table-cell">Name</th>
			<th class="db-table-cell">Displacement</th>
			<th class="db-table-cell">Power</th>
			<th class="db-table-cell">Torque</th>
			<th class="db-table-cell">Fuel Type</th>
			<th class="db-table-cell">Built By</th>
		</tr>
		<?php
			foreach ($engines as $row)
			{
				$jsParams = "{'name': '" . $row["Name"] . "', 'displacement': '" . $row["Displacement"] . "', 'power': '" . $row["Power"] . "', 'torque': '" . $row["Torque"] . "', 'fuel': '" . $row["FuelType"] . "', 'builder': '" . $row["BuiltBy"] . "'}";
				echo '<tr class="db-table-row" onclick="showEditBox(' . $jsParams . ')">';

				echo '<td class="db-table-cell">' . $row["Name"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Displacement"] . ' l</td>';
				echo '<td class="db-table-cell">' . $row["Power"] . ' kW</td>';
				echo '<td class="db-table-cell">' . $row["Torque"] . ' N&#xb7;m</td>';
				echo '<td class="db-table-cell">' . $row["FuelType"] . '</td>';
				echo '<td class="db-table-cell">' . $row["BuiltBy"] . '</td>';

				echo '</tr>';
			}
		?>
	</table>
</div>

<?php
	if ($error != "")
		echo "<p class=\"error\">$error</p>";
	if ($success != "")
		echo "<p class=\"success\">$success</p>";
?>

<a class="btn" href="#" onclick="showAddBox(); return false;">Add Car Engine</a>

<div class="popup-background" id="add-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Add/add_car_engine.php" enctype="multipart/form-data">
			<p class="form-input-field">
				<label class="form-input-label" for="add_name">Name:</label><br />
				<input class="form-input" type="text" name="name" id="add_name" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_displacement">Displacement [l]:</label><br />
				<input class="form-input" type="text" name="displacement" id="add_displacement" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_power">Power [kW]:</label><br />
				<input class="form-input" type="text" name="power" id="add_power" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_torque">Torque [N&#xb7;m]:</label><br />
				<input class="form-input" type="text" name="torque" id="add_torque" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_fuel">Fuel type:</label><br />
				<input class="form-input" type="text" name="fuel" id="add_fuel" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_builder">Built by:</label><br />
				<select class="form-input" name="builder" id="add_builder">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($makes as $group)
						{
							echo '<option class="form-input-option" value="' . $group["Name"] . '">' . $group["Name"] . '</option>';
						}
					?>
				</select>
			</p>
			<input type="submit" id="submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Add Car Engine</a>
			<a class="btn" href="#" onclick="hideAddBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="edit-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Edit/edit_car_engine.php" enctype="multipart/form-data">
			<p class="form-input-field">
				<label class="form-input-label" for="edit_name">Name:</label><br />
				<input class="form-input" type="text" name="name" id="edit_name" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_displacement">Displacement [l]:</label><br />
				<input class="form-input" type="text" name="displacement" id="edit_displacement" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_power">Power [kW]:</label><br />
				<input class="form-input" type="text" name="power" id="edit_power" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_torque">Torque [N&#xb7;m]:</label><br />
				<input class="form-input" type="text" name="torque" id="edit_torque" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_fuel">Fuel type:</label><br />
				<input class="form-input" type="text" name="fuel" id="edit_fuel" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_builder">Built by:</label><br />
				<select class="form-input" name="builder" id="edit_builder">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($makes as $group)
						{
							echo '<option class="form-input-option" value="' . $group["Name"] . '">' . $group["Name"] . '</option>';
						}
					?>
				</select>
			</p>
			<input type="submit" id="edit-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('edit-submit').click(); return false;">Submit Changes</a>
			<a class="btn" href="#" onclick="promptDelete(['name']); return false;">Delete this Engine</a>
			<a class="btn" href="#" onclick="hideEditBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="prompt-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Remove/remove_car_engine.php">
			<input type="hidden" name="name" id="delete_name" />
			<p>Are you sure you want to delete this car make?</p>
			<input type="submit" id="delete-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('delete-submit').click(); return false;">Delete Car Engine</a>
			<a class="btn" href="#" onclick="hidePromptBox(); return false;">Cancel</a>
		</form>
	</div>
</div>