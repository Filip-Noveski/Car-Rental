<script type="text/javascript" src="js/manage.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="db-table-container">
	<table class="db-table">
		<tr class="db-table-row">
			<th class="db-table-cell">Name</th>
			<th class="db-table-cell">Generation</th>
			<th class="db-table-cell">Sub-model</th>
			<th class="db-table-cell">Engine</th>
			<th class="db-table-cell">Make</th>
			<th class="db-table-cell">Seats Count</th>
			<th class="db-table-cell">Doors Count</th>
			<th class="db-table-cell">Body type</th>
		</tr>
		<?php
			foreach ($models as $row)
			{
				$jsParams = "{'name': '" . $row["Name"] . "', 'gen': '" . $row["Generation"] . "', 'subm': '" . $row["Submodel"] . "', 'engine': '" . $row["Engine"] . "', 'make': '" . $row["Make"] . "', 'seats': '" . $row["SeatsCount"] . "', 'doors': '" . $row["DoorsCount"] . "', 'body': '" . $row["Body"] . "'}";
				echo '<tr class="db-table-row" onclick="showEditBox(' . $jsParams . ')">';

				echo '<td class="db-table-cell">' . $row["Name"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Generation"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Submodel"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Engine"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Make"] . '</td>';
				echo '<td class="db-table-cell">' . $row["SeatsCount"] . '</td>';
				echo '<td class="db-table-cell">' . $row["DoorsCount"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Body"] . '</td>';

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

<a class="btn" href="#" onclick="showAddBox(); return false;">Add Car Model</a>

<div class="popup-background" id="add-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Add/add_car_model.php" enctype="multipart/form-data">
			<p class="form-input-field">
				<label class="form-input-label" for="add_name">Name:</label><br />
				<input class="form-input" type="text" name="name" id="add_name" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_gen">Generation:</label><br />
				<input class="form-input" type="text" name="gen" id="add_gen" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_subm">Sub-model:</label><br />
				<input class="form-input" type="text" name="subm" id="add_subm" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_engine">Engine:</label><br />
				<select class="form-input" name="engine" id="add_engine">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($engines as $group)
						{
							echo '<option class="form-input-option" value="' . $group["Name"] . '">' . $group["Name"] . '</option>';
						}
					?>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_make">Make:</label><br />
				<select class="form-input" name="make" id="add_make">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($makes as $group)
						{
							echo '<option class="form-input-option" value="' . $group["Name"] . '">' . $group["Name"] . '</option>';
						}
					?>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_seats">Number of seats:</label><br />
				<input class="form-input" type="number" name="seats" id="add_seats" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_doors">Number of doors:</label><br />
				<input class="form-input" type="number" name="doors" id="add_doors" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_body">Body type:</label><br />
				<input class="form-input" type="text" name="body" id="add_body" />
			</p>
			<input type="submit" id="submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Add Car Model</a>
			<a class="btn" href="#" onclick="hideAddBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="edit-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Edit/edit_car_model.php" enctype="multipart/form-data">
			<p class="form-input-field">
				<label class="form-input-label" for="edit_name">Name:</label><br />
				<input class="form-input" type="text" name="name" id="edit_name" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_gen">Generation:</label><br />
				<input class="form-input" type="text" name="gen" id="edit_gen" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_subm">Sub-model:</label><br />
				<input class="form-input" type="text" name="subm" id="edit_subm" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_engine">Engine:</label><br />
				<select class="form-input" name="engine" id="edit_engine" disabled>
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($engines as $group)
						{
							echo '<option class="form-input-option" value="' . $group["Name"] . '">' . $group["Name"] . '</option>';
						}
					?>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_make">Make:</label><br />
				<select class="form-input" name="make" id="edit_make" disabled>
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($makes as $group)
						{
							echo '<option class="form-input-option" value="' . $group["Name"] . '">' . $group["Name"] . '</option>';
						}
					?>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_seats">Number of seats:</label><br />
				<input class="form-input" type="number" name="seats" id="edit_seats" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_doors">Number of doors:</label><br />
				<input class="form-input" type="number" name="doors" id="edit_doors" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_body">Body type:</label><br />
				<input class="form-input" type="text" name="body" id="edit_body" />
			</p>
			<input type="submit" id="edit-submit" style="display: none" />
			<a class="btn" href="#" onclick="editModelSubmit(); return false;">Submit Changes</a>
			<a class="btn" href="#" onclick="promptDelete(['name', 'gen', 'subm', 'engine']); return false;">Delete this Model</a>
			<a class="btn" href="#" onclick="hideEditBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="prompt-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Remove/remove_car_model.php">
			<input type="hidden" name="name" id="delete_name" />
			<input type="hidden" name="gen" id="delete_gen" />
			<input type="hidden" name="subm" id="delete_subm" />
			<input type="hidden" name="engine" id="delete_engine" />
			<p>Are you sure you want to delete this car make?</p>
			<input type="submit" id="delete-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('delete-submit').click(); return false;">Delete Car Model</a>
			<a class="btn" href="#" onclick="hidePromptBox(); return false;">Cancel</a>
		</form>
	</div>
</div>