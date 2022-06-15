function showAddBox() {
    var popup = document.getElementById("add-box");
    popup.style.display = "inline-block";
}

function hideAddBox() {
    var popup = document.getElementById("add-box");
    popup.style.display = "none";
}

function toggleFieldsEmployee() {
    var option = document.getElementById("role").value;
    if (option == "admin") {
        document.getElementById("uid").disabled = true;
        document.getElementById("from").disabled = true;
        document.getElementById("until").disabled = true;
        return;
    }
    else {
        document.getElementById("uid").disabled = false;
        document.getElementById("from").disabled = false;
        document.getElementById("until").disabled = false;
    }
}

function showEditBox(params) {
    var popup = document.getElementById("edit-box");
    popup.style.display = "inline-block";
    for (var key in params) {
        if (params.hasOwnProperty(key))
            document.getElementById(`edit_${key}`).value = params[key];
    }
}

function hideEditBox() {
    var popup = document.getElementById("edit-box");
    popup.style.display = "none";
}

function hidePromptBox() {
    var popup = document.getElementById("prompt-box");
    popup.style.display = "none";
}

function promptDelete(fields) {
    var popup = document.getElementById("prompt-box");
    popup.style.display = "inline-block";

    for (var i in fields) {
        var deleteId = document.getElementById(`edit_${fields[i]}`).value;
        document.getElementById(`delete_${fields[i]}`).value = deleteId;
    }
}

function editModelSubmit() {
    document.getElementById("edit_engine").disabled = false;
    document.getElementById("edit_make").disabled = false;
	document.getElementById('edit-submit').click();
}

function fillServiceTable(vehicleData, serviceParams) {
    var table = document.getElementById("service-table");

    var innerHtml = `<br /><h3 class="heading">Service data for: ${vehicleData}</h3>`;

    innerHtml += `
	    <table class="db-table">
		    <tr class="db-table-row">
			    <th class="db-table-cell" style="width: 284px">Service Company</th>
			    <th class="db-table-cell" style="width: 284px">Location</th>
			    <th class="db-table-cell">Date</th>
			    <th class="db-table-cell">Price</th>
		    </tr>`;

    for (var key in serviceParams) {
        if (serviceParams.hasOwnProperty(key)) {
            innerHtml += `<tr class="db-table-row">
			    <td class="db-table-cell">${serviceParams[key]["scn"]}</td>
			    <td class="db-table-cell">${serviceParams[key]["scl"]}</td>
			    <td class="db-table-cell">${serviceParams[key]["date"]}</td>
			    <td class="db-table-cell">${serviceParams[key]["price"]}</td>
		    </tr>`;
        }
    }

    innerHtml += `</table>`;

    table.innerHTML = innerHtml;
}