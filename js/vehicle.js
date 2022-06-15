var displayed = 0;

function changeTab(toDisplay, regPlate) {
    document.getElementById(`info-vehicle-${ regPlate }`).style.display = "none";
    document.getElementById(`info-engine-${ regPlate }`).style.display = "none";
    document.getElementById(`info-model-${regPlate}`).style.display = "none";
    try {
        document.getElementById(`info-rents-${regPlate}`).style.display = "none";
        document.getElementById(`info-branch-${regPlate}`).style.display = "none";
    }
    finally {
        document.getElementById(`info-${toDisplay}-${regPlate}`).style.display = "inline-block";
    }    
}

function displayFullScreen() {
    var popup = document.getElementById("img-popup");
    var img = document.getElementById("img-popup-img");
    var source = document.getElementById("img-main-full");

    popup.style.display = "inline-block";
    img.style.backgroundImage = source.style.backgroundImage;
}

function swapFullScreen(toDisplay) {
    if (toDisplay == "next") {
        ++displayed;
    }
    else {
        --displayed;
    }
    var img = document.getElementById("img-popup-img");
    var source = document.getElementById(`smallimg-main-${displayed}`);

    try {
        img.style.backgroundImage = source.style.backgroundImage;
    }
    catch {
        if (toDisplay == "next") {
            displayed = -1;
            swapFullScreen("next");
        }
        else {
            ++displayed;
        }
    }
}