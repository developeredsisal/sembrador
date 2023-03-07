let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");

    localStorage.setItem("menuState", navigation.classList.contains("active"));
};

const menuState = localStorage.getItem("menuState");

if (menuState === "true") {
    navigation.classList.add("active");
    main.classList.add("active");
} else {
    navigation.classList.remove("active");
    main.classList.remove("active");
}

const topbar = document.querySelector('.topbar');

toggle.addEventListener('click', () => {
  if (navigation.classList.contains('active')) {
    topbar.style.left = '80px';
    topbar.style.width = 'calc(100% - 80px)';
  } else {
    topbar.style.left = '300px';
    topbar.style.width = 'calc(100% - 300px)';
  }
});