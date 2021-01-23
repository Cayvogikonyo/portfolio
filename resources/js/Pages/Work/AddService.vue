<template>
    <div>
        <div class="flex flex-wrap">
            <div :key="index" class="p-2 px-4 mx-2 rounded-lg shadow cursor-pointer" @click="setSelected(item)" :class="addedServices.indexOf(item) !== -1 ? 'bg-blue-200':''" v-for="(item, index) in services">
                <h3 class="font-bold">{{item.title}}</h3>
            </div>      
        </div>
        <div class="flex flex-wrap justify-end">
            <jet-secondary-button class="mx-2" @click.native.prevent="skip">
                Cancel
            </jet-secondary-button>
            <jet-button class="mx-2" @click.native.prevent="updateService" :disabled="selected.length === 0">
                Continue
            </jet-button>
        </div>
    </div>
</template>

<script>
    import JetButton from '@/Jetstream/Button'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        components: {
            JetButton,
            JetSecondaryButton
        },

        props: {
            services : {
                type: Array,
                default: function () {
                    return []
                },
            },        
            selectedservices : {
                type: Array,
                default: function () {
                    return []
                },
            },
            
        },
        mounted(){
            console.log(this.services);
        },
        data() {
            return {
                selected: [],
            }
        },

        computed:{
            addedServices() {
                return this.selected.concat(this.selectedservices);
            }
        },
        methods: {
            updateService() {
                this.$emit('service', {
                    data: this.addedServices
                });                
                this.selected = [];
            },
            skip() {
                this.$emit('skip', {});                
            },
            setSelected(item) {
                if(this.selectedservices.indexOf(item) > -1){

                }else if(this.selected.indexOf(item) > -1){
                    this.selected.splice(this.selected.indexOf(item), 1);                
                }else{
                    this.selected.push(item);                
                }
            },

        },
    }
</script>
