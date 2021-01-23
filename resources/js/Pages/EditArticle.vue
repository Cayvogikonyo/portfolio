<template>
    <app-layout>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 flex flex-col">
            <my-editor v-bind:uid="uid" v-bind:isEdit="isEdit" :categories="categories"/>
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
        mounted() {
            console.log('Component mounted.');
        },
        props:{
            categories: {
                type: Array,
                default: function(){
                    return new Array()
                },
            },
            isEdit: {
                type: Boolean,
                default: true,
            },
            uid: {
                type: Number,
            }
        },
    }
</script>
