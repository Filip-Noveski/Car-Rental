<script type="text/javascript" src="js/manage.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="db-table-container">
	<table class="db-table">
		<tr class="db-table-row">
			<th class="db-table-cell">Name</th>
			<th class="db-table-cell" style="width: 256px">Location</th>
			<th class="db-table-cell">Group</th>
			<th class="db-table-cell">Phone</th>
			<th class="db-table-cell">Email</th>
		</tr>
		<?php
			foreach ($serviceCos as $row)
			{
				$jsParams = "{'id': '" . $row["Id"] . "', 'name': '" . $row["Name"] . "', 'group': '" . $row["Group"] . "', 'phone': '" . $row["Phone"] . "', 'location': '" . $row["Location"] . "', 'email': '" . $row["Email"] . "'}";
				echo '<tr class="db-table-row" onclick="showEditBox(' . $jsParams . ')">';

				echo '<td class="db-table-cell">' . $row["Name"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Location"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Group"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Phone"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Email"] . '</td>';

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

<a class="btn" href="#" onclick="showAddBox(); return false;">Add Service Company</a>

<div class="popup-background" id="add-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Add/add_ser_co.php">
			<p class="form-input-field">
				<label class="form-input-label" for="add_name">Name:</label><br />
				<input class="form-input" type="text" name="name" id="add_name" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_location">Location:</label><br />
				<input class="form-input" type="text" name="location" id="add_location" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_group">Group:</label><br />
				<select class="form-input" name="group" id="add_group">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($groups as $group)
						{
							echo '<option class="form-input-option" value="' . $group["Name"] . '">' . $group["Name"] . '</option>';
						}
					?>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_phone">Phone Number:</label><br />
				<input class="form-input" type="tel" name="phone" id="add_phone" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_email">Email:</label><br />
				<input class="form-input" type="text" name="email" id="add_email" />
			</p>
			<input type="submit" id="submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Add Service Company</a>
			<a class="btn" href="#" onclick="hideAddBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="edit-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Edit/edit_ser_co.php">
			<input type="hidden" name="id" id="edit_id" />
			<p class="form-input-field">
				<label class="form-input-label" for="edit_name">Name:</label><br />
				<input class="form-input" type="text" name="name" id="edit_name" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_location">Location:</label><br />
				<input class="form-input" type="text" name="location" id="edit_location" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_group">Group:</label><br />
				<select class="form-input" name="group" id="edit_group">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($groups as $group)
						{
							echo '<option class="form-input-option" value="' . $group["Name"] . '">' . $group["Name"] . '</option>';
						}
					?>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_phone">Phone Number:</label><br />
				<input class="form-input" type="tel" name="phone" id="edit_phone" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_email">Email:</label><br />
				<input class="form-input" type="text" name="email" id="edit_email" />
			</p>
			<input type="submit" id="edit-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('edit-submit').click(); return false;">Submit Changes</a>
			<a class="btn" href="#" onclick="promptDelete(['id']); return false;">Delete this Service Company</a>
			<a class="btn" href="#" onclick="hideEditBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="prompt-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Remove/remove_ser_co.php">
			<input type="hidden" name="id" id="delete_id" />
			<p>Are you sure you want to delete this service company?</p>
			<input type="submit" id="delete-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('delete-submit').click(); return false;">Delete Service Company</a>
			<a class="btn" href="#" onclick="hidePromptBox(); return false;">Cancel</a>
		</form>
	</div>
</div>