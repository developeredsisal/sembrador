let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");
let topbar = document.querySelector(".topbar");
const menuState = localStorage.getItem("menuState");

toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
    topbar.classList.toggle("active");

    localStorage.setItem("menuState", navigation.classList.contains("active"));
    localStorage.setItem("topbar", topbar.classList.contains("active"));
};

if (menuState === "true") {
    navigation.classList.add("active");
    main.classList.add("active");
    topbar.classList.add("active");
} else {
    navigation.classList.remove("active");
    main.classList.remove("active");
    topbar.classList.remove("active");
}
