function promptRent() {
    document.getElementById("prompt-rent").style.display = "inline-block";
}

function updatePrice(weeklyPrice) {
    var price = document.getElementById("total-price");
    var weeks = document.getElementById("length").value;
    price.innerHTML = Math.round(weeklyPrice * weeks * 100) / 100;
}