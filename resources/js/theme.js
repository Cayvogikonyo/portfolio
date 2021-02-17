document.addEventListener('DOMContentLoaded', function(){ 
    //Loader setings
    setTimeout(function(){
        document.getElementsByTagName("BODY")[0].classList.add('loaded');

            if(document.getElementById("section-left")){
                document.getElementById('section-left').classList.add('-translate-x-full');
            }

            if(document.getElementById("section-right")){
                document.getElementById('section-right').classList.add('translate-x-full');
            }
       

            if(document.getElementById("loader")){
                document.getElementById('loader').classList.add('hidden');
            }
       
            setTimeout(function(){
                if(document.getElementById("loader-wrapper")){
                    document.getElementById('loader-wrapper').classList.add('hidden', 'translate-y-full', 'z-0');
                }
            },500);
       
            if(document.getElementById("content")){
                document.getElementById("content").classList.remove('hidden','opacity-0');
                document.getElementById("content").classList.add('opacity-100');
            }
    }, 700);

    //Check and set theme
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    var themeIcons = document.getElementsByClassName('themeIcon');

    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        if(themeIcons){
            [].forEach.call(themeIcons, function(icon) {
                icon.classList.remove('fa-moon', 'text-gray-900');
                icon.classList.add('fa-sun', 'text-yellow-600');
            });
        }
    } else {
        document.documentElement.classList.remove('dark');
        if(themeIcons){
            [].forEach.call(themeIcons, function(icon) {
                icon.classList.remove('fa-sun', 'text-yellow-600');
                icon.classList.add('fa-moon', 'text-gray-900');
            });
        }
        
    }
}, false);


var btnBounce = document.getElementById("scrollBounce");
if(btnBounce){
    btnBounce.addEventListener('click', scrollDown)
}


function scrollDown(){
    document.getElementById('sectioncontent')
    .scrollIntoView({ behavior: 'smooth' });
}

/****
 * Toggle theme functionality
 */
var themebtns = document.getElementsByClassName("themebtn");
var themeicons = document.getElementsByClassName("themeIcon");
for(var i=0; i < themebtns.length; i++){
    themebtns[i].addEventListener('click', toggleTheme)
}

function toggleTheme(){
    if(localStorage.theme === 'dark'){
        // Whenever the user explicitly chooses light mode
        localStorage.theme = 'light';
        document.documentElement.classList.remove('dark');
        [].forEach.call(themeicons, function(themeicon) {
            themeicon.classList.remove('fa-sun', 'text-yellow-600');
            themeicon.classList.add('fa-moon','text-gray-900');
        });
    }else{
        // Whenever the user explicitly chooses dark mode
        localStorage.theme = 'dark';
        document.documentElement.classList.add('dark');
        [].forEach.call(themeicons, function(themeicon) {
            themeicon.classList.remove('fa-moon', 'text-gray-900');
            themeicon.classList.add('fa-sun','text-yellow-600');
        });
       
    }
}

function respectPreferences(){
    // Whenever the user explicitly chooses to respect the OS preference
    localStorage.removeItem('theme')
}


/***********************************************************************
 * ***********ToolTips***********************************************
 *******************************************************************/
import { createPopper } from '@popperjs/core';

let buttons = document.getElementsByClassName('pop-prop');
let tooltip = null;
let attach = null;
let popperInstance = null;

function create() {
    if(attach !== null){
        var place = attach.getAttribute('data-placement') ? attach.getAttribute('data-placement'):'right-start';

        popperInstance = createPopper(attach, tooltip, {
            placement: place,
            modifiers: [
                {
                    name: 'offset',
                    options: {
                        offset: [0, 8],
                    },
                },
            ],
        });
    }
}

function destroy() {
  if (popperInstance) {
    popperInstance.destroy();
    popperInstance = null;
  }
}

function show() {
    attach = this;
    var id = attach.getAttribute('data-uid');
    tooltip = document.getElementById('tooltip'+id);
    tooltip.setAttribute('data-show', '');
    create();
}

function hide() {
    attach = this;
    var id = attach.getAttribute('data-uid');
    tooltip = document.getElementById('tooltip'+id);
    tooltip.removeAttribute('data-show');
    destroy();
}

const showEvents = ['mouseenter', 'focus'];
const hideEvents = ['mouseleave', 'blur'];

showEvents.forEach(event => {
    for(var i=0; i < buttons.length; i++){
        buttons[i].addEventListener(event, show);
    }
});

hideEvents.forEach(event => {
    for(var i=0; i < buttons.length; i++){
        buttons[i].addEventListener(event, hide);
    }
});