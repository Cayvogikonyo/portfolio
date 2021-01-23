<template>
    <app-layout>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 flex flex-col">
            <my-editor :categories="categories" />
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import MyEditor from '../components/MyEditor.vue';

    export default {
        components: {
            AppLayout,
            MyEditor,
        },
        props:{
            categories: {
                type: Array,
                default: function(){
                    return new Array()
                },
            },
        },
        mounted() {
            console.log('Component mounted.');
        },
    }
</script>
