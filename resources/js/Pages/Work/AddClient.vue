<template>
    <div>
        <div class="flex flex-wrap">
            <div :key="index" class="p-2 px-4 mx-2 rounded-lg shadow cursor-pointer" @click="setSelected(item)" :class="addedClients.indexOf(item) !== -1 ? 'bg-blue-200':''" v-for="(item, index) in clients">
                <h3 class="font-bold">{{item.title}}</h3>
            </div>      
        </div>
        <div class="flex flex-wrap justify-end">
            <jet-secondary-button class="mx-2" @click.native.prevent="skip">
                Cancel
            </jet-secondary-button>
            <jet-button class="mx-2" @click.native.prevent="updateClient"  :class="{ 'opacity-25': selected.length === 0 }" :disabled="selected.length === 0">
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
            clients : {
                type: Array,
                default: function () {
                    return []
                },
            },        
            selectedclients : {
                type: Array,
                default: function () {
                    return []
                },
            },
            
        },
        mounted(){
            console.log("clients", this.$props, this.selected);
        },

        computed: {
            addedClients() {
                return this.selected.concat(this.selectedclients);
            }
        },

        data() {
            return {
                selected: [],
            }
        },

        methods: {
            updateClient() {
                this.$emit('client', {
                    data: this.addedClients
                });                
                this.selected = [];
            },
            skip() {
                this.$emit('skip', {});                
            },
            setSelected(item) {
                if(this.selectedclients.indexOf(item) > -1){
                    
                }else if(this.selected.indexOf(item) > -1){
                    this.selected.splice(this.selected.indexOf(item), 1);                
                }else{
                    this.selected.push(item);                
                }
            },

        },
    }
</script>
