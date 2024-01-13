import "./bootstrap.js";
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import "./styles/app.css";

const navbarToggle = document.querySelector(".navbar-toggler");
const navBarNav = document.querySelector(".navbar-nav");
const navBarText = document.querySelector("#navbarText");
navbarToggle.addEventListener("click", function () {
  if (!navbarToggle.classList.contains("collapsed")) {
    navBarText.classList.add("navbarText-mobile");
    navBarNav.classList.remove("ms-auto");
  } else {
    setTimeout(() => {
      navBarText.classList.remove("navbarText-mobile");
      navBarNav.classList.add("ms-auto");
    }, 3000);
  }
});

const screenMobileXL = document.querySelector(".screenMobileXL");
const screenMobileSM = document.querySelector(".screenMobileSM");
const screenMobileDispoXL = document.querySelector(".screenMobileDispoXL");
const screenMobileDispoSM = document.querySelector(".screenMobileDispoSM");

if (window.innerWidth < 900) {
  screenMobileXL.style.display = "none";
  screenMobileSM.style.display = "block";
  screenMobileDispoXL.style.display = "none";
  screenMobileDispoSM.style.display = "block";
} else {
  screenMobileXL.style.display = "block";
  screenMobileSM.style.display = "none";
  screenMobileDispoXL.style.display = "block";
  screenMobileDispoSM.style.display = "none";
}

window.addEventListener("resize", function () {
  let win = this;
  console.log(win.innerWidth);
  if (win.innerWidth < 900) {
    screenMobileXL.style.display = "none";
    screenMobileSM.style.display = "block";
    screenMobileDispoXL.style.display = "none";
    screenMobileDispoSM.style.display = "block";
  } else {
    screenMobileXL.style.display = "block";
    screenMobileSM.style.display = "none";
    screenMobileDispoXL.style.display = "block";
    screenMobileDispoSM.style.display = "none";
  }
});



// sildes
const btns = document.querySelector('.actions-slider');
if (window.innerWidth < 900) {
  btns.style.display = "block";
} else {
  btns.style.display = "none";
}

window.addEventListener("resize", function () {
  let window = this;
  console.log(window.innerWidth);
  if (window.innerWidth < 900) {
    btns.style.display = "block";
  } else {
    btns.style.display = "none";
  }
});

