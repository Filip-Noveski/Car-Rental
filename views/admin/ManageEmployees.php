<script type="text/javascript" src="js/manage.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="db-table-container">
	<table class="db-table">
		<tr class="db-table-row">
			<th class="db-table-cell">Role</th>
			<th class="db-table-cell">First Name</th>
			<th class="db-table-cell">Last Name</th>
			<th class="db-table-cell">Email</th>
			<th class="db-table-cell">Phone</th>
			<th class="db-table-cell">Unique Id</th>
			<th class="db-table-cell">Salary</th>
			<th class="db-table-cell">Date of Birth</th>
			<th class="db-table-cell">Working Hours</th>
		</tr>
		<?php
			foreach ($admins as $row)
			{
				$jsParams = "{'role': 'admin', 'email': '" . $row["Email"] . "', 'name': '" . $row["FirstName"] . ' ' . $row["LastName"] . "', 'salary': '" . $row["Salary"] . "'}";
				echo '<tr class="db-table-row" onclick="showEditBox(' . $jsParams . ')">';

				echo '<td class="db-table-cell">' . 'Admin' . '</td>';
				echo '<td class="db-table-cell">' . $row["FirstName"] . '</td>';
				echo '<td class="db-table-cell">' . $row["LastName"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Email"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Phone"] . '</td>';
				echo '<td class="db-table-cell">' . '' . '</td>';
				echo '<td class="db-table-cell">' . $row["Salary"] . '</td>';
				echo '<td class="db-table-cell">' . $row["DateOfBirth"] . '</td>';
				echo '<td class="db-table-cell">' . '' . '</td>';

				echo '</tr>';
			}

			foreach ($salespeople as $row)
			{
				$jsParams = "{'role': 'sales', 'email': '" . $row["Email"] . "', 'uid': '" . $row["UniqueId"] . "', 'name': '" . $row["FirstName"] . ' ' . $row["LastName"] . "', 'from': '" . $row["WorksFrom"] . "', 'until': '" . $row["WorksUntil"] . "', 'salary': '" . $row["Salary"] . "', 'works-at': '" . $row["WorksAt"] . "'}";
				echo '<tr class="db-table-row" onclick="showEditBox(' . $jsParams . ')">';

				echo '<td class="db-table-cell">' . 'Salesperson' . '</td>';
				echo '<td class="db-table-cell">' . $row["FirstName"] . '</td>';
				echo '<td class="db-table-cell">' . $row["LastName"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Email"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Phone"] . '</td>';
				echo '<td class="db-table-cell">' . $row["UniqueId"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Salary"] . '</td>';
				echo '<td class="db-table-cell">' . $row["DateOfBirth"] . '</td>';
				echo '<td class="db-table-cell">' . $row["WorksFrom"] . " - " . $row["WorksUntil"] . '</td>';

				echo '</tr>';
			}

			foreach ($maintenance as $row)
			{
				$jsParams = "{'role': 'maint', 'email': '" . $row["Email"] . "', 'uid': '" . $row["UniqueId"] . "', 'name': '" . $row["FirstName"] . ' ' . $row["LastName"] . "', 'from': '" . $row["WorksFrom"] . "', 'until': '" . $row["WorksUntil"] . "', 'salary': '" . $row["Salary"] . "', 'works-at': '" . $row["WorksAt"] . "'}";
				echo '<tr class="db-table-row" onclick="showEditBox(' . $jsParams . ')">';

				echo '<td class="db-table-cell">' . 'Maintenance' . '</td>';
				echo '<td class="db-table-cell">' . $row["FirstName"] . '</td>';
				echo '<td class="db-table-cell">' . $row["LastName"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Email"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Phone"] . '</td>';
				echo '<td class="db-table-cell">' . $row["UniqueId"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Salary"] . '</td>';
				echo '<td class="db-table-cell">' . $row["DateOfBirth"] . '</td>';
				echo '<td class="db-table-cell">' . $row["WorksFrom"] . " - " . $row["WorksUntil"] . '</td>';

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

<a class="btn" href="#" onclick="showAddBox(); return false;">Add Employee</a>

<div class="popup-background" id="add-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Add/add_employee.php">
			<p class="form-input-field">
				<label class="form-input-label" for="add_role">Employee Role:</label><br />
				<select class="form-input" name="role" id="add_role" onchange="toggleFields()">
					<option class="form-input-option" value="">--Select--</option>
					<option class="form-input-option" value="admin">Admin</option>
					<option class="form-input-option" value="sales">Salesperson</option>
					<option class="form-input-option" value="maint">Maintenance</option>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_first">First Name:</label><br />
				<input class="form-input" type="text" name="first" id="add_first" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_last">Last Name:</label><br />
				<input class="form-input" type="text" name="last" id="add_last" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_uid">Unique Id:</label><br />
				<input class="form-input" type="number" name="uid" id="add_uid" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_email">Email:</label><br />
				<input class="form-input" type="text" name="email" id="add_email" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_phone">Phone:</label><br />
				<input class="form-input" type="tel" name="phone" id="add_phone" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_salary">Salary:</label><br />
				<input class="form-input" type="number" name="salary" id="add_salary" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_dob">Date of brith:</label><br />
				<input class="form-input" type="date" name="dob" id="add_dob" />
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
				<label class="form-input-label" for="add_works-at">Works At:</label><br />
				<select class="form-input" name="works-at" id="add_works-at">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($branches as $branch)
						{
							echo '<option class="form-input-option" value="' . $branch["Id"] . '">' . $branch["Name"] . '</option>';
						}
					?>
				</select>
			</p>
			<input type="submit" id="submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Add Employee</a>
			<a class="btn" href="#" onclick="hideAddBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="edit-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Edit/edit_employee.php">
			<input type="hidden" name="uid" id="edit_uid" />
			<input type="hidden" name="role" id="edit_role" />
			<p class="form-input-field">
				<label class="form-input-label" for="edit_name">Name:</label><br />
				<input class="form-input" type="text" name="name" id="edit_name" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_email">Email:</label><br />
				<input class="form-input" type="text" name="email" id="edit_email" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="from">Works From [Hour]:</label><br />
				<input class="form-input" type="time" name="from" id="edit_from" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="until">Works Until [Hour]:</label><br />
				<input class="form-input" type="time" name="until" id="edit_until" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="salary">Salary:</label><br />
				<input class="form-input" type="number" name="salary" id="edit_salary" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_works-at">Works At:</label><br />
				<select class="form-input" name="works-at" id="edit_works-at">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($branches as $branch)
						{
							echo '<option class="form-input-option" value="' . $branch["Id"] . '">' . $branch["Name"] . '</option>';
						}
					?>
				</select>
			</p>
			<input type="submit" id="edit-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('edit-submit').click(); return false;">Submit Changes</a>
			<a class="btn" href="#" onclick="promptDelete(['uid', 'email', 'role']); return false;">Delete this Employee</a>
			<a class="btn" href="#" onclick="hideEditBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="prompt-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Remove/remove_employee.php">
			<input type="hidden" name="uid" id="delete_uid" />
			<input type="hidden" name="email" id="delete_email" />
			<input type="hidden" name="role" id="delete_role" />
			<p>Are you sure you want to delete this employee?</p>
			<input type="submit" id="delete-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('delete-submit').click(); return false;">Delete Employee</a>
			<a class="btn" href="#" onclick="hidePromptBox(); return false;">Cancel</a>
		</form>
	</div>
</div>