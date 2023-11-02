document.getElementById("menu-button").addEventListener("click", function (event) {
  event.preventDefault();
  var menuButton = this;

  if (menuButton.classList.contains("active")) {

    menuButton.classList.remove("active");
    menuButton.querySelector(".text").textContent = "Menu";
  } else {

    menuButton.classList.add("active");
    menuButton.querySelector(".text").textContent = "Exit";
  }
});


