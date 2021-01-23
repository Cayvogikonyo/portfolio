<template>
    <app-layout>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 flex flex-col">
            <select-layout :current="config.layout" />
            <hr class="my-6">
            <site-information :siteconfig="config" />
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import SelectLayout from './Site/SelectLayout.vue'
    import SiteInformation from './Site/SiteInformation.vue'

    export default {
        components: {
            AppLayout,
            SelectLayout,
            SiteInformation
        },
        props:{
            config: {
                type: Object,
                default: function(){
                    return { }
                }
            }
        },
        mounted() {
            console.log('Component mounted.');
        },
        data() {
            return {
                
            }
        },
        methods: {}
    }
</script>
