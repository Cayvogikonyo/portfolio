/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/contactus.js ***!
  \***********************************/
var btn = document.getElementById("contactBtn");

if (btn) {
  btn.onclick = function () {
    contactus();
  };
}

function contactus() {
  var http = new XMLHttpRequest();
  http.open("POST", "contactus", true);
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var uname = document.getElementById('name').value;
  var email = document.getElementById('email').value;
  var message = document.getElementById('message').value;
  var data = new FormData();
  data.append('name', uname);
  data.append('email', email);
  data.append('message', message);
  http.send(data);

  http.onload = function () {
    alert(http.responseText);
  };
}
/******/ })()
;