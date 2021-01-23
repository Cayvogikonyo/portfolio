<template>
    <div class="w-full md:w-5/6 mx-auto py-4">
        <h3 class="my-2 font-bold text-lg underlined"> <i class="text-red-600 fa fa-angle-double-right"></i> Home Page Layout</h3>
        <div class="w-full px-6 mx-auto grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-site-bg bg-cover bg-no-repeat shadow h-48 w-full relative">
                <div class="absolute bottom-0 left-0 right-0 bg-indigo-100 bg-opacity-75 flex flex-col">
                    <div class="py-2">
                        <label for="layout" class="">Flipper</label>
                        <button class="rounded bg-transparent border border-green-600 hover:bg-green-600 p-2 py-1 mx-3 transition ease-in-out duration-400 transform hover: -translate-x-2">Preview</button>
                    </div>
                    <input type="radio" name="layout" id="welcome" value="welcome" :checked="form.layout === 'welcome'" v-model="form.layout">
                </div>
            </div>
            <div class="bg-site-bg bg-cover bg-no-repeat shadow h-48 relative">
                <div class="absolute bottom-0 left-0 right-0 bg-indigo-100 bg-opacity-75 flex flex-wrap flex-col justify-center">
                    <div class="py-2">
                        <label for="layout" class="">Blog</label>
                        <button class="rounded bg-transparent border border-green-600 hover:bg-green-600 p-2 py-1 mx-3 transition ease-in-out duration-400 transform hover: -translate-x-2">Preview</button>
                    </div>
                    <input type="radio" name="layout" id="blog" value="blog" :checked="form.layout === 'blog'" v-model="form.layout">
                </div>
            </div>
            <div class="bg-site-bg bg-cover bg-no-repeat shadow h-48 relative">
                <div class="absolute bottom-0 left-0 right-0 bg-indigo-100 bg-opacity-75 flex flex-wrap flex-col justify-center">
                    <div class="py-2">
                        <label for="layout" class="">Layout1</label>
                        <button class="rounded bg-transparent border border-green-600 hover:bg-green-600 p-2 py-1 mx-3 transition ease-in-out duration-400 transform hover: -translate-x-2">Preview</button>
                    </div>
                    <input type="radio" name="layout" id="layout1" value="layout1" :checked="form.layout === 'layout1'" v-model="form.layout">
                </div>
            </div>       
        </div>
        <div class="flex flex-wrap justify-end my-4" v-if="hasChange">
            <button @click="updateSiteLayout" class="rounded border border-green-600 bg-green-600 p-2 py-1 mx-3 transition ease-in-out duration-400 transform hover: -translate-x-2">Update Layout</button>
        </div>
    </div>
</template>

<script>
import Button from '../../Jetstream/Button.vue'
export default {
  components: { Button },
    props: {
        current:{
            type: String,
            default: ''
        }
    },
    data(){
        return {
            form: this.$inertia.form({
                layout: this.current,
            }, {
                bag: 'updateSiteLayout',
            }),
        }
    },
    computed:{
        hasChange(){
            return this.current !== this.form.layout;
        }
    },
    methods:{
         updateSiteLayout() {
            this.form.post(route('update-layout'), {
                preserveScroll: true,
                onSuccess: () => this.form.reset(),
                onFinish: () => this.setLayout(),
            })
        },
        setLayout(){
            this.form.layout = this.current;
        }
    }
}
</script>
