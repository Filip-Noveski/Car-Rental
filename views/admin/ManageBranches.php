<script type="text/javascript" src="js/manage.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="db-table-container">
	<table class="db-table">
		<tr class="db-table-row">
			<th class="db-table-cell">Name</th>
			<th class="db-table-cell">Working Hours</th>
			<th class="db-table-cell">Location</th>
			<th class="db-table-cell">Coordinates</th>
			<th class="db-table-cell">Vehicles Count</th>
		</tr>
		<?php
			foreach ($branches as $row)
			{
				$jsParams = "{'id': '" . $row["Id"] . "', 'name': '" . $row["Name"] . "', 'from': '" . $row["OpensAt"] . "', 'until': '" . $row["ClosesAt"] . "', 'coords-x': '" . $row["CoordsX"] . "', 'coords-y': '" . $row["CoordsY"] . "', 'location': '" . $row["Location"] . "'}";
				echo '<tr class="db-table-row" onclick="showEditBox(' . $jsParams . ')">';

				echo '<td class="db-table-cell">' . $row["Name"] . '</td>';
				echo '<td class="db-table-cell">' . $row["OpensAt"] . " - " . $row["ClosesAt"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Location"] . '</td>';
				echo '<td class="db-table-cell">' . $row["CoordsX"] . '% N; ' . $row["CoordsY"] . '% E' . '</td>';
				echo '<td class="db-table-cell">' . (isset($row["VehCount"]) ? $row["VehCount"] : "0")  . '</td>';

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

<a class="btn" href="#" onclick="showAddBox(); return false;">Add Branch</a>

<div class="popup-background" id="add-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Add/add_branch.php">
			<p class="form-input-field">
				<label class="form-input-label" for="add_name">Name:</label><br />
				<input class="form-input" type="text" name="name" id="add_name" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_from">Works From [Hour]:</label><br />
				<input class="form-input" type="time" name="from" id="add_from" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_until">Works Until [Hour]:</label><br />
				<input class="form-input" type="time" name="until" id="add_until" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_coords-x">Coordinates North (%):</label><br />
				<input class="form-input" type="number" name="coords-x" step="0.01" id="add_coords-x" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_coords-y">Coordinates East (%):</label><br />
				<input class="form-input" type="number" name="coords-y" step="0.01" id="add_coords-y" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_location">Location/Address:</label><br />
				<input class="form-input" type="text" name="location" id="add_location" />
			</p>
			<input type="submit" id="add-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('add-submit').click(); return false;">Add Branch</a>
			<a class="btn" href="#" onclick="hideAddBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="edit-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Edit/edit_branch.php">
			<input type="hidden" name="id" id="edit_id" />
			<p class="form-input-field">
				<label class="form-input-label" for="edit_name">Name:</label><br />
				<input class="form-input" type="text" name="name" id="edit_name" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_from">Works From [Hour]:</label><br />
				<input class="form-input" type="time" name="from" id="edit_from" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_until">Works Until [Hour]:</label><br />
				<input class="form-input" type="time" name="until" id="edit_until" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_coords-x">Coordinates North (%):</label><br />
				<input class="form-input" type="number" name="coords-x" step="0.01" id="edit_coords-x" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_coords-y">Coordinates East (%):</label><br />
				<input class="form-input" type="number" name="coords-y" step="0.01" id="edit_coords-y" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_location">Location/Address:</label><br />
				<input class="form-input" type="text" name="location" id="edit_location" />
			</p>
			<input type="submit" id="edit-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('edit-submit').click(); return false;">Submit Changes</a>
			<a class="btn" href="#" onclick="promptDelete(['id']); return false;">Delete this Branch</a>
			<a class="btn" href="#" onclick="hideEditBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="prompt-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Remove/remove_branch.php">
			<input type="hidden" name="id" id="delete_id" />
			<p>Are you sure you want to delete this branch?</p>
			<input type="submit" id="delete-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('delete-submit').click(); return false;">Delete Branch</a>
			<a class="btn" href="#" onclick="hidePromptBox(); return false;">Cancel</a>
		</form>
	</div>
</div>