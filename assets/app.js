import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css'

const navbarToggle = document.querySelector('.navbar-toggler');
const navBarNav = document.querySelector('.navbar-nav');
const navBarText = document.querySelector('#navbarText');
navbarToggle.addEventListener('click', function () {
    if(!navbarToggle.classList.contains('collapsed')){
       navBarText.classList.add('navbarText-mobile');
       navBarNav.classList.remove('ms-auto');
    }else {
      setTimeout(() => {
         navBarText.classList.remove('navbarText-mobile');
         navBarNav.classList.add('ms-auto');
      }, 3000);
    }
})

