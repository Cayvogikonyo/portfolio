<template>
  <div class="m-auto">
    <label class="block dark:text-gray-100 font-bold my-2">{{title}}</label>
    <div class="flex flex-wrap justify-between">
        <input type="text" v-model="text" class="p-2 rounded shadow-sm placeholder-black bg-indigo-200 dark:bg-green-400 shadow-sm" :class="text ? 'w-3/4':'w-full'" :placeholder="placeholder" id="tag" v-on:keyup.enter="addToChosen">
        <success-btn v-if="text !== ''" :classes="'p-0'" @click.native="addToChosen">Add Tag</success-btn>
    </div>
    <div class="flex flex-wrap py-2">
        <span class="shadow-sm bg-indigo-200 dark:bg-green-400 px-3 p-1 mx-2 rounded" :key="index" v-for="(item, index) in chosen">{{item}}</span>
    </div>
  </div>
</template>

<script>
import SuccessBtn from './SuccessBtn.vue';
export default {
    components: {
        SuccessBtn
    },
    props: {
        suggestions: Array,
        chosen: Array,
        index: Number,
        title:{
            type: String,
            default: 'Add Tags'
        },
        placeholder:{
            type: String,
            default: 'Enter tags and press add'
        }
    },
    data(){
        return{
            text: '',
        }
    },
    methods: {
        addToChosen(){
            this.$emit('add-tag', {index: this.index, name: this.text});
            this.text = '';
        }
    }
}
</script>

<style>

</style>