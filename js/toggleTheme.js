function toggleTheme() {
    var themeToggle = document.getElementById("theme-toggle");
    var themeStyle = document.getElementById("theme-style");

    if (localStorage["theme"] == "dark") {
        localStorage["theme"] = "light";
        themeStyle.href = root + "/css/style_light.css";
        themeToggle.style.marginLeft = "3px";
        navImg.src = root + "/images/icons/logo_colour.svg";
        footImg.src = root + "/images/icons/logo_colour.svg";
        try {
            homeImg.src = root + "/images/icons/logo_colour.svg";
        }
        catch { }
        return;
    }

    if (localStorage["theme"] == "light") {
        localStorage["theme"] = "dark";
        themeStyle.href = root + "/css/style_dark.css";
        themeToggle.style.marginLeft = "19px";
        navImg.src = root + "/images/icons/logo_colour_invert.svg";
        footImg.src = root + "/images/icons/logo_colour_invert.svg";
        try {
            homeImg.src = root + "/images/icons/logo_colour_invert.svg";
        }
        catch { }
    }
}