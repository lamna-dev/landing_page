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

const screenDesktop = document.querySelector(".screenDesktop");
const screenMobileSM = document.querySelector(".screenMobileSM");
const screenMobileDispoXL = document.querySelector(".screenMobileDispoXL");
const screenMobileDispoSM = document.querySelector(".screenMobileDispoSM");
const contentCards = document.getElementById('content');  

if (window.innerWidth < 900) {
  screenDesktop.style.display = "none";
  screenMobileSM.style.display = "block";
  screenMobileDispoXL.style.display = "none";
  screenMobileDispoSM.style.display = "block";
  contentCards.classList.remove('screenDesktopForSlides');
} else {
  screenDesktop.style.display = "block";
  screenMobileSM.style.display = "none";
  screenMobileDispoXL.style.display = "block";
  screenMobileDispoSM.style.display = "none";
  contentCards.classList.add('screenDesktopForSlides');
}

window.addEventListener("resize", function () {
  let win = this;
  if (win.innerWidth < 900) {
    screenDesktop.style.display = "none";
    screenMobileSM.style.display = "block";
    screenMobileDispoXL.style.display = "none";
    screenMobileDispoSM.style.display = "block";
    contentCards.classList.remove('screenDesktopForSlides');
  } else {
    screenDesktop.style.display = "block";
    screenMobileSM.style.display = "none";
    screenMobileDispoXL.style.display = "block";
    screenMobileDispoSM.style.display = "none";
    contentCards.classList.add('screenDesktopForSlides');
  }
});

// sildes
const button = document.getElementById('slide');
const back = document.getElementById('slideBack');
const container = document.getElementById('container');
const cardWidth = 450;
var position = 0;

button.addEventListener('click', () => {
  position += cardWidth
  container.scrollTo({
    left: position,
    behavior: 'smooth',
  });
})

back.addEventListener('click', () => {
  position -= cardWidth
  container.scrollTo({
    left: position,
    behavior: 'smooth',
  });
})

const progressiveContent = document.getElementById('section-progressive-content');
const concept1 = document.getElementById('concept1');
const concept2 = document.getElementById('concept2');
const concept3 = document.getElementById('concept3');

document.getElementsByTagName('body')[0].onscroll = () => {
  const marge = 400;
  if(scrollY >= progressiveContent.offsetTop - marge) {
    concept1.style.opacity = 1;
    if(scrollY >= concept2.offsetTop - marge) {
      concept2.style.opacity = 1;
    }
    if(scrollY >= concept3.offsetTop - marge) {
      concept3.style.opacity = 1;
    }
  }

  if(scrollY < progressiveContent.offsetTop - marge) {
    concept1.style.opacity = 1;
    concept2.style.opacity = .2;
    concept3.style.opacity = .2;
  }
}







