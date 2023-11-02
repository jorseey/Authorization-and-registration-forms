document.getElementById("menu-button").addEventListener("click", function (event) {
    event.preventDefault();
    var burgerMenu = document.getElementById("burger-menu");
    var footer = document.querySelector("footer");
    var mainPage = document.querySelector(".main-page");

    if (burgerMenu.style.display === "none" || burgerMenu.style.display === "") {
        burgerMenu.style.display = "block";
        footer.style.display = "none";
        mainPage.style.display = "none";


    } else {
        burgerMenu.style.display = "none";
        footer.style.display = "";
        mainPage.style.display = "";

    }
});

