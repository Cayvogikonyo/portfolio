/******/ (() => { // webpackBootstrap
/*!***********************************!*\
  !*** ./resources/js/animation.js ***!
  \***********************************/
window.onscroll = function () {
  scrollAnimations();
};

function scrollAnimations() {
  console.log("sdfds", document.documentElement.scrollTop, window.screen.height, document.getElementsByClassName("section")[1], document.getElementsByClassName("section-contents")[2]);

  if (document.getElementsByClassName("section-contents")[1]) {
    if (document.documentElement.scrollTop > window.screen.height / 4) {
      document.getElementsByClassName("section-contents")[1].classList.remove('animate-fade-out-fast', 'opacity-0');
      document.getElementsByClassName("section-contents")[1].classList.add('animate-zoomslow', 'opacity-100');
    } else {
      document.getElementsByClassName("section-contents")[1].classList.add('animate-fade-out-fast', 'opacity-0');
      document.getElementsByClassName("section-contents")[1].classList.remove('animate-zoomslow', 'opacity-100');
    }
  }

  if (document.getElementsByClassName("section-contents")[2]) {
    if (document.documentElement.scrollTop > window.screen.height - window.screen.height / 4) {
      document.getElementsByClassName("section-contents")[2].classList.remove('animate-fade-out-fast', 'opacity-0');
      document.getElementsByClassName("section-contents")[2].classList.add('animate-zoomslow', 'opacity-100');
    } else {
      document.getElementsByClassName("section-contents")[2].classList.add('animate-fade-out-fast', 'opacity-0');
      document.getElementsByClassName("section-contents")[2].classList.remove('animate-zoomslow', 'opacity-100');
    }
  }

  if (document.getElementsByClassName("section-contents")[3]) {
    if (document.documentElement.scrollTop > window.screen.height + window.screen.height / 4) {
      document.getElementsByClassName("section-contents")[3].classList.remove('animate-fade-out-fast', 'opacity-0');
      document.getElementsByClassName("section-contents")[3].classList.add('animate-zoomslow', 'opacity-100');
    } else {
      document.getElementsByClassName("section-contents")[3].classList.add('animate-fade-out-fast', 'opacity-0');
      document.getElementsByClassName("section-contents")[3].classList.remove('animate-zoomslow', 'opacity-100');
    }
  } // if(document.body.scrollTop < window.screen.height/2 || document.documentElement.scrollTop < window.screen.height/2 ){
  //     var items = document.getElementsByClassName("section-contents");
  //     for(var i=0; i < items.length; i++){
  //         items[i].classList.remove('animate-zoomslow')
  //     }
  // }

}
/******/ })()
;