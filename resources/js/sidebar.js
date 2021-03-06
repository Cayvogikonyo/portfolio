//Add menu listeners
var btns = document.getElementsByClassName("menubtns");
if(btns.length > 0){
    for(var i=0; i < btns.length; i++){
        btns[i].addEventListener('click', toggleSidebar)
    }
}

function toggleSidebar() {
    if(!document.getElementById("sidebar").classList.contains('hidden')){
        document.getElementById("sidebar").classList.remove('animate-fadeexpand');
        document.getElementById("sidebar").classList.add('animate-fadeshrink');
        setTimeout(function(){
            if(document.getElementById("sidebar")){
                document.getElementById("sidebar").classList.add('hidden');
            }
        }, 300);
    }else{
        document.getElementById("sidebar").classList.remove('hidden','animate-fadeshrink');
        document.getElementById("sidebar").classList.add('animate-fadeexpand');
    }
}