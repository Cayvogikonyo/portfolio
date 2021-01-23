/******/ (() => { // webpackBootstrap
/*!*******************************!*\
  !*** ./resources/js/theme.js ***!
  \*******************************/
document.addEventListener('DOMContentLoaded', function () {
  //Loader setings
  setTimeout(function () {
    document.getElementsByTagName("BODY")[0].classList.add('loaded');
    setTimeout(function () {
      if (document.getElementById("content")) {
        document.getElementById("content").classList.remove('hidden');
        document.getElementById("content").classList.add('animate-zoom');
      }
    }, 500);
  }, 1300); //Check and set theme
  // On page load or when changing themes, best to add inline in `head` to avoid FOUC

  var icon = document.getElementById('themeIcon');

  if (localStorage.theme === 'dark' || !('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    document.querySelector('body').classList.add('dark');

    if (icon) {
      icon.classList.remove('fa-sun');
      icon.classList.add('fa-moon');
    }
  } else {
    document.querySelector('body').classList.remove('dark');

    if (icon) {
      icon.classList.remove('fa-moon');
      icon.classList.add('fa-sun');
    }
  }
}, false);
var btn = document.getElementById("themebtn");
console.log(btn);

if (btn) {
  btn.addEventListener('click', toggleTheme);
}

function toggleTheme() {
  var icon = document.getElementById('themeIcon');

  if (localStorage.theme === 'dark') {
    // Whenever the user explicitly chooses light mode
    localStorage.theme = 'light';
    icon.classList.remove('fa-sun');
    icon.classList.add('fa-moon');
  } else {
    // Whenever the user explicitly chooses dark mode
    localStorage.theme = 'dark';
    icon.classList.remove('fa-moon');
    icon.classList.add('fa-sun');
  }
}

function respectPreferences() {
  // Whenever the user explicitly chooses to respect the OS preference
  localStorage.removeItem('theme');
}
/******/ })()
;