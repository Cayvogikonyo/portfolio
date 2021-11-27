<template>
    <manage>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 flex flex-col" v-if="config">
            <select-layout :current="config.layout" />
            <hr class="my-6">
            <site-information :siteconfig="config" />
        </div>
    </manage>
</template>

<script>
import Manage from './Manage.vue'
    import SelectLayout from './Site/SelectLayout.vue'
    import SiteInformation from './Site/SiteInformation.vue'

    export default {
        components: {
            SelectLayout,
            SiteInformation,
                Manage
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
