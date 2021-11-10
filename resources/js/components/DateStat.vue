<template>
    <div :class="containerclasses">
        <div class="flex" v-if="!imagehidden">
            <img class="max-h-24" :src="imgSrc()" />
            
        </div>
        <div class="text-2xl font-medium leading-8 mt-3">{{getDate(date)}}</div>
        <h3 class="font-extrabold py-3" ref="time" >{{timeNow()}}</h3>
    </div>
</template>

<script>
    import moment from 'moment'

    export default {
        data(){
            return {
                date: new Date(),
            }

        },
        props: {
            imagehidden: {
                type: Boolean,
                default: false
            },
            containerclasses: {
                type: Boolean,
                default: 'box p-5'
            }
        },
        mounted(){
            this.startTimer()
        },
        methods:{
            startTimer(){
                var _this = this
                var timerInterval = setInterval(function(){
                    var d = _this.timeNow()
                    if(_this.$refs.time){
                        _this.$refs.time.innerHTML = d
                    }else{
                        clearInterval(timerInterval)
                    }
                }, 1000)
            },
            getDate(date){
                if(date){
                    return moment(date).format('MMMM Do, YYYY')
                }
                return null
            },
            getHour(datestring){
                var d = new Date(datestring)

                return d.getHours()
            },
            timeNow(){
                return moment().format('h:mm:ss a')
            },            
            imgSrc(){
                if(this.getHour(this.date)>6 && this.getHour(this.date)<18)
                    return window.Laravel.baseUrl + '/images/sun.png';
                else
                    return window.Laravel.baseUrl + '/images/moon.png';
            },
        }
    }
</script>
