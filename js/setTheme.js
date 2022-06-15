root = "/project";

if (localStorage["theme"] == undefined) {
    localStorage["theme"] = "light";
}

var themeToggle = document.getElementById("theme-toggle");
var themeStyle = document.getElementById("theme-style");
var navImg = document.getElementById("nav-img");
var footImg = document.getElementById("foot-img");
var homeImg = document.getElementById("home-img");

if (localStorage["theme"] == "light") {
    themeStyle.href = root + "/css/style_light.css";
    themeToggle.style.marginLeft = "3px";
    navImg.src = root + "/images/icons/logo_colour.svg";
    footImg.src = root + "/images/icons/logo_colour.svg";
    try {
        homeImg.src = root + "/images/icons/logo_colour.svg";
    }
    catch {}
}
else if (localStorage["theme"] == "dark") {
    themeStyle.href = root + "/css/style_dark.css";
    themeToggle.style.marginLeft = "19px";
    navImg.src = root + "/images/icons/logo_colour_invert.svg";
    footImg.src = root + "/images/icons/logo_colour_invert.svg";
    try {
        homeImg.src = root + "/images/icons/logo_colour_invert.svg";
    }
    catch { }
}