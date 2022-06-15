body = "Are you sure you want to purchase the <i>@memb</i> membership?<br />Benefits: <i>@disc%</i> discount for <i>@mon months</i>.<br />Price: <i>&euro; @price</i>";

function promptPurchase(type, discount, duration, price, activeMemb, email) {
    if (email == "---unset---") {
        var popup = document.getElementById("prompt-login");
        popup.style.display = "inline-block";
        return;
    }

    if (activeMemb != "None") {
        var popup = document.getElementById("prompt-member");
        popup.style.display = "inline-block";
        return;
    }

    var popup = document.getElementById("prompt-purchase");
    popup.style.display = "inline-block";
    var text = document.getElementById("purchase-info");
    text.innerHTML = body
        .replace("@memb", type)
        .replace("@disc", discount * 100)
        .replace("@mon", duration)
        .replace("@price", price);
    document.getElementById("type").value = type;
    document.getElementById("email").value = email;
}