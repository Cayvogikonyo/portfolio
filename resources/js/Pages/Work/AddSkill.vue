<template>
    <div>
        <div class="flex">
            <div :key="index" class="px-4 mx-2 rounded-lg shadow cursor-pointer flex justify-between" @click="setSelected(item)" :class="addedSkills.indexOf(item) !== -1 ? 'bg-blue-200':''" v-for="(item, index) in skills">
                <h6 class="font-bold">{{item.title}}</h6>
            </div>    
            <new-skill></new-skill>  
        </div>
        <div class="flex flex-wrap justify-end">
            <jet-secondary-button class="mx-2" @click.native.prevent="skip">
                Cancel
            </jet-secondary-button>
            <jet-button class="mx-2" @click.native.prevent="updateSkill" :disabled="selected.length === 0">
                Continue
            </jet-button>
        </div>
    </div>
</template>

<script>
    import JetButton from '@/Jetstream/Button'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import NewSkill from './NewSkill.vue'

    export default {
        components: {
            JetButton,
            JetSecondaryButton,
            NewSkill
        },

        props: {
            skills : {
                type: Array,
                default: function () {
                    return []
                },
            },        
            selectedSkills : {
                type: Array,
                default: function () {
                    return []
                },
            },
            
        },
        mounted(){
            console.log(this.skills);
        },
        data() {
            return {
                selected: [],
            }
        },
        computed:{
            addedSkills() {
                return this.selected.concat(this.selectedSkills);
            }
        },
        methods: {
            updateSkill() {
                this.$emit('skill', {
                    data: this.addedSkills
                });                
                this.selected = [];
            },
            skip() {
                this.$emit('skip', {});                
            },
            setSelected(item) {
                if(this.selectedSkills.indexOf(item) > -1){
                    
                }else if(this.selected.indexOf(item) > -1){
                    this.selected.splice(this.selected.indexOf(item), 1);                
                }else{
                    this.selected.push(item);                
                }
            },

        },
    }
</script>
