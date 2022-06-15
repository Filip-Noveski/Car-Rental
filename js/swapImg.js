function swapImg(fullSizeId, imgPath) {
    var div = document.getElementById(fullSizeId);
    div.style.backgroundImage = `url('${imgPath}')`;
    div.innerHTML = "";
}

function putMap(fullSizeId, coordsX, coordsY) {
    var div = document.getElementById(fullSizeId);
    div.style.backgroundImage = `url('images/images/map.png')`;

    imgPath = "images/icons/map_pin.svg";
    x = coordsX + 2;
    y = (coordsY - 2.5) * 0.69 + 15.5; // due to div width being greater than image width
    div.innerHTML = `<div class="map-pin-container" style="left: ${y}%; bottom: ${x}%"><img class="map-pin" src="${imgPath}" /></div>`;
}