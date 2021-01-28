window.onscroll = function() {scrollAnimations()};

function scrollAnimations() {
    if(document.getElementById("featured")){
        var top = (document.documentElement.clientHeight + document.documentElement.scrollTop);
        if (top > (document.getElementById("featured").offsetTop+document.getElementById("featured").offsetHeight/3)) {
            document.getElementById("featured").classList.remove('opacity-0', 'animate-fadeoutfast');
            document.getElementById("featured").classList.add('animate-fadein', 'opacity-100');
        }else if(top > document.getElementById("featured").offsetTop && 
        top < (document.getElementById("featured").offsetTop+document.getElementById("featured").offsetHeight/3)) {               
            document.getElementById("featured").classList.remove('animate-fadein', 'opacity-100');
            document.getElementById("featured").classList.add('animate-fadeoutfast','opacity-0');
        }
    }
    
    if(document.getElementById("bio")){
        var top = document.documentElement.clientHeight + document.documentElement.scrollTop;
        if (top > (document.getElementById("bio").offsetTop+document.getElementById("bio").offsetHeight/3)) {
            document.getElementById("bio").classList.remove('opacity-0',  'translate-x-full','animate-fadeoutfast');
            document.getElementById("bio").classList.add('animate-fadein', 'opacity-100');
        }else if(top > document.getElementById("bio").offsetTop && 
        top < (document.getElementById("bio").offsetTop+document.getElementById("bio").offsetHeight/3)) {               
            document.getElementById("bio").classList.remove('animate-fadein', 'opacity-100');
            document.getElementById("bio").classList.add('animate-fadeoutfast','opacity-0', 'translate-x-full');
        }
    }
    
    if(document.getElementById("contact")){
        var top = document.documentElement.clientHeight + document.documentElement.scrollTop;
        if (top > (document.getElementById("contact").offsetTop+document.getElementById("contact").offsetHeight/3)) {
            document.getElementById("contact").classList.remove('animate-fadeoutfast', 'opacity-0');
            document.getElementById("contact").classList.add('animate-fadein', 'opacity-100');
        }else if(top > document.getElementById("contact").offsetTop && 
        top < (document.getElementById("contact").offsetTop+20)) {               
            document.getElementById("contact").classList.remove('animate-fadein', 'opacity-100');
            document.getElementById("contact").classList.add('animate-fadeoutfast','opacity-0');
        }
    }
        
    if(document.getElementById("works")){
        var top = document.documentElement.clientHeight+document.documentElement.scrollTop;
        if (top > (document.getElementById("works").offsetTop+document.getElementById("works").offsetHeight * 0.75)) {
            var items = document.getElementsByClassName("work-item");
            for(var i=0; i < items.length; i++){
                    items[i].classList.remove('animate-fadeoutfast','opacity-0');
                    items[i].classList.add('opacity-100',  'animate-fadein');
            }
        }else if(top > document.getElementById("works").offsetTop && 
        top < (document.getElementById("works").offsetTop+document.getElementById("works").offsetHeight * 0.75)) {               
            var items = document.getElementsByClassName("work-item");
            for(var i=0; i < items.length; i++){
                items[i].classList.add('animate-fadeoutfast', 'opacity-0');
                items[i].classList.remove('opacity-100',  'animate-fadein');
            }
            
        }
    }
        
    if(document.getElementById("posts")){
        var top = document.documentElement.clientHeight+document.documentElement.scrollTop;
        if (top > (document.getElementById("posts").offsetTop+document.getElementById("posts").offsetHeight/3)) {
            var items = document.getElementsByClassName("blog-item");
            for(var i=0; i < items.length; i++){
                items[i].classList.remove('animate-fadeoutfast', 'opacity-0',  'translate-x-1/2');
                items[i].classList.add('opacity-100',  'animate-fadein');
            }
        }else if(top > document.getElementById("posts").offsetTop && 
        top < (document.getElementById("posts").offsetTop+document.getElementById("posts").offsetHeight/3)) {               
            var items = document.getElementsByClassName("blog-item");
            for(var i=0; i < items.length; i++){
                items[i].classList.add('opacity-0',  'translate-x-1/2','animate-fadeoutfast');
                items[i].classList.remove('opacity-100',  'animate-fadein');
            }
            
        }
    }
    
  
}
