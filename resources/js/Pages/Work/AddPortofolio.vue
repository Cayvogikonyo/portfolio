<template>
    <div>
        <div class="flex flex-wrap">
            <div :key="index" class="p-2 px-4 mx-2 rounded-lg shadow" @click="setSelected(portofolio.id, index)" :class="selected === portofolio.id ? 'bg-blue-200':''" v-for="(portofolio, index) in portofolios">
                <img :src="portofolio.avatar" :alt="portofolio.name" class="rounded-full h-20 w-20 object-cover">
                <div>
                    <h3>{{portofolio.name}}</h3>
                </div>
            </div>      
        </div>
        <div class="flex flex-wrap justify-end">
            <jet-secondary-button class="mx-2" @click.native.prevent="skip">
                Cancel
            </jet-secondary-button>
            <jet-button class="mx-2" @click.native.prevent="updatePortofolio" :disabled="selected === null">
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
            portofolios : {
                type: Array,
                default: function () {
                    return []
                },
            },
            portofolio_id : {
                type: Number,
                default: null,
            },
            portofolioIndex : {
                type: Number,
                default: null,
            }
        },

        data() {
            return {
                selected: this.portofolio_id,
                index: this.portofolioIndex,
            }
        },

        methods: {
            updatePortofolio() {
                this.$emit('portofolio', {
                    portofolio_id: this.selected,
                    index: this.index
                });                
                this.selected = null;
            },
            skip() {
                this.$emit('skip', {});                
            },
            setSelected(id, index) {
                this.selected = id;                
                this.index = index;                
            },

        },
    }
</script>
