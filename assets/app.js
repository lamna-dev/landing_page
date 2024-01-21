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
const contentCards = document.getElementById("content");
const progressiveContent = document.getElementById(
  "section-progressive-content"
);

if (window.innerWidth < 900) {
  if (screenDesktop !== null) {
    screenDesktop.style.display = "none";
  }
  if (screenMobileSM !== null) {
    screenMobileSM.style.display = "block";
  }
  if (screenMobileDispoXL !== null) {
    screenMobileDispoXL.style.display = "none";
  }
  if (screenMobileDispoSM !== null) {
    screenMobileDispoSM.style.display = "block";
  }
  if (contentCards !== null) {
    contentCards.classList.remove("screenDesktopForSlides");
  }
} else {
  if (screenDesktop !== null) {
    screenDesktop.style.display = "block";
  }
  if (screenMobileSM !== null) {
    screenMobileSM.style.display = "none";
  }
  if (screenMobileDispoXL !== null) {
    screenMobileDispoXL.style.display = "block";
  }
  if (screenMobileDispoSM !== null) {
    screenMobileDispoSM.style.display = "none";
  }
  if (contentCards !== null) {
    contentCards.classList.add("screenDesktopForSlides");
  }
}

window.addEventListener("resize", function () {
  let win = this;
  console.log(win.innerWidth);
  if (win.innerWidth < 900) {

    if (screenDesktop !== null) {
      screenDesktop.style.display = "none";
    }
    if (screenMobileSM !== null) {
      screenMobileSM.style.display = "block";
    }
    if (screenMobileDispoXL !== null) {
      screenMobileDispoXL.style.display = "none";
    }
    if (screenMobileDispoSM !== null) {
      screenMobileDispoSM.style.display = "block";
    }
    if (contentCards !== null) {
      contentCards.classList.remove("screenDesktopForSlides");
    }
  } else {
    if (screenDesktop !== null) {
      screenDesktop.style.display = "block";
    }
    if (screenMobileSM !== null) {
      screenMobileSM.style.display = "none";
    }
    if (screenMobileDispoXL !== null) {
      screenMobileDispoXL.style.display = "block";
    }
    if (screenMobileDispoSM !== null) {
      screenMobileDispoSM.style.display = "none";
    }
    if (contentCards !== null) {
      contentCards.classList.add("screenDesktopForSlides");
    }
  }
});

// sildes
const button = document.getElementById("slide");
const back = document.getElementById("slideBack");
const container = document.getElementById("container");
const cardWidth = 450;
let position = 0;

if (button !== null) {
  button.addEventListener("click", () => {
    position += cardWidth;
    container.scrollTo({
      left: position,
      behavior: "smooth",
    });
  });
}

if (back !== null) {
  back.addEventListener("click", () => {
    position -= cardWidth;
    container.scrollTo({
      left: position,
      behavior: "smooth",
    });
  });
}


// CONCEPTS

const concept1 = document.getElementById("concept1");
const concept2 = document.getElementById("concept2");
const concept3 = document.getElementById("concept3");
const initialImage = document.getElementById("main-concept1-img");
const secondaryImage = document.getElementById("main-concept2-img");
const tertiaryImage = document.getElementById("main-concept3-img");
const numberImage = document.getElementById("number-image");

concept1.style.opacity = 1;
initialImage.style.display = "block";
concept2.style.opacity = 0.2;
secondaryImage.style.display = "none";
concept3.style.display = 0.2;
tertiaryImage.style.display = "none";

document.getElementsByTagName("body")[0].onscroll = () => {
  console.log("SCROLL", scrollY);
  console.log("POSITION ELEMENT", progressiveContent.offsetTop);
  console.log(numberImage);

  if (scrollY > 1100 && scrollY < 1249) {
    concept1.style.opacity = 1;
    concept2.style.opacity = 0.2;
    concept3.style.opacity = 0.2;
    initialImage.style.display = "block";
    secondaryImage.style.display = "none";
    tertiaryImage.style.display = "none";
    numberImage.textContent = "1"
  } 
  if (scrollY > 1250 && scrollY < 1329) {
    concept1.style.opacity = 0.2;
    concept2.style.opacity = 1;
    concept3.style.opacity = 0.2;
    initialImage.style.display = "none";
    secondaryImage.style.display = "block";
    tertiaryImage.style.display = "none";
    numberImage.textContent = "2"
  }
  if (scrollY >= 1330){
    concept1.style.opacity = 0.2;
    concept2.style.opacity = 0.2;
    concept3.style.opacity = 1;
    initialImage.style.display = "none";
    secondaryImage.style.display = "none";
    tertiaryImage.style.display = "block";
    numberImage.textContent = "3"
  }
};

// CONCEPTS MOBILE

// sildes
const buttonConcepts = document.getElementById("slide-concepts-mobile");
const backConcepts = document.getElementById("slideBack-concepts-mobile");
const containerConcepts = document.getElementById("container-concepts-mobile");
const cardWidthConcepts = 355;
let positionConcept = 0;

if (buttonConcepts !== null) {
  buttonConcepts.addEventListener("click", () => {
    positionConcept += cardWidthConcepts;
    containerConcepts.scrollTo({
      left: positionConcept,
      behavior: "smooth",
    });
  });
}

if (backConcepts !== null) {
  backConcepts.addEventListener("click", () => {
    positionConcept -= cardWidthConcepts;
    containerConcepts.scrollTo({
      left: positionConcept,
      behavior: "smooth",
    });
  });
}
