<template>
  <div id="slider">
    <transition name="fade">
      <figure>
            <div id="slider-img"></div>
      </figure>
    </transition>

  </div>
</template>

<script>
import LazyLoad from '../utilities/LazyLoad';

export default {
    name: 'Slider',
    data() {
        return {
            timer: null,
            currentIndex: 0,
        }
    },
    directives: {
        lazyload: LazyLoad
    },
    props: ['images'],
    mounted: function() {
        this.slide();
        $('#slider-img').css("background-image", "url(" + this.backGround() + ")").fadeIn(500);
    },
  
    methods: {  
      next: function() {
        this.currentIndex += 1
      },
      prev: function() {
        this.currentIndex -= 1
      },
      showImage: function(index) {
        this.currentIndex = index;
      },
      backGround: function() {
        return this.images[Math.abs(this.currentIndex) % this.images.length];
      },
      slide: function() {
        var myVar = setInterval(() => {
            this.currentIndex++
            if(this.currentIndex >= this.images.length){
              this.currentIndex = 0;
            }
            $('#slider-img').fadeOut(500)
            let backInterval = setInterval(()=>{
              $('#slider-img').css("background-image", "url(" + this.backGround() + ")").fadeIn(500);
              clearInterval(backInterval)
            }, 500)
       
        }, 5500);

      },
    },
  
    computed: {
      currentImg: function() {
        return this.images[Math.abs(this.currentIndex) % this.images.length];
      }
    },  
}
</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: all 0.9s ease;
  overflow: hidden;
  visibility: visible;
  position: absolute;
  width:100%;
  opacity: 1;
}

.fade-enter,
.fade-leave-to {
  visibility: hidden;
  width:100%;
  opacity: 0;
}


.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.7s ease;
  border-radius: 4px;
  text-decoration: none;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
}

.prev {
  left: 0;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.7);
}
</style>
