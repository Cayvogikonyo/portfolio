<template>
    <div class="w-full md:w-5/6 mx-auto py-4">
        <h3 class="my-2 font-bold text-lg underlined"> <i class="text-red-600 fa fa-angle-double-right"></i> Site Information</h3>
        <label for="header" class="block font-bold px-6">Site header</label>
        <div class="w-full relative flex flex-wrap">
            <div class="w-full md:w-5/6">
                <div class="w-full my-4 px-6 mx-auto grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-site-bg bg-cover bg-no-repeat shadow h-48 w-full relative">
                        <div class="absolute bottom-0 left-0 right-0 bg-indigo-100 bg-opacity-75 flex flex-col">
                            <div class="py-2">
                                <label for="header" class="">Image 1</label>
                            </div>
                            <input type="radio" name="header" id="header1" value="bg-site-bg" :checked="form.site_header === 'bg-site-bg'" v-model="form.site_header">
                        </div>
                    </div>
                    <div class="bg-site-2 bg-cover bg-no-repeat shadow h-48 relative">
                        <div class="absolute bottom-0 left-0 right-0 bg-indigo-100 bg-opacity-75 flex flex-wrap flex-col justify-center">
                            <div class="py-2">
                                <label for="header" class="">Image 2</label>
                            </div>
                            <input type="radio" name="header" id="header2" value="bg-site-2" :checked="form.site_header === 'bg-site-2'" v-model="form.site_header">
                        </div>
                    </div>
                    <div class="bg-site-3 bg-cover bg-no-repeat shadow h-48 relative">
                        <div class="absolute bottom-0 left-0 right-0 bg-indigo-100 bg-opacity-75 flex flex-wrap flex-col justify-center">
                            <div class="py-2">
                                <label for="header" class="">Image 3</label>
                            </div>
                            <input type="radio" name="header" id="header3" value="bg-site-3" :checked="form.site_header === 'bg-site-3'" v-model="form.site_header">
                        </div>
                    </div>       
                </div>
                <div class="w-full px-6 flex flex-wrap mx-auto">
                    <div class=" w-full md:w-1/3 py-2">
                        <label for="title" class="block font-bold">Title</label>
                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" v-if="editTitle" type="text" name="title" id="title" v-model="form.title">
                        <h5 v-else>{{siteconfig.title}}</h5>
                        <button @click="editTitle = !editTitle" class="rounded my-1 bg-transparent border border-green-600 hover:bg-green-600 p-2 py-1 mx-3 transition ease-in-out duration-400 transform hover: -translate-x-2">
                            <i class="fas fa-times" v-if="editTitle"></i>
                            <i class="fas fa-edit" v-else></i>
                        </button>
                    </div>
                    <div class=" w-full md:w-1/3 py-2">
                        <label for="subtitle" class="block font-bold">Subtitle</label>
                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" v-if="editSubtitle" type="text" name="subtitle" id="subtitle" v-model="form.subtitle">
                        <h5 v-else>{{siteconfig.subtitle}}</h5>

                        <button @click="editSubtitle = !editSubtitle" class="rounded my-1 bg-transparent border border-green-600 hover:bg-green-600 p-2 py-1 mx-3 transition ease-in-out duration-400 transform hover: -translate-x-2">                            
                            <i class="fas fa-times" v-if="editSubtitle"></i>
                            <i class="fas fa-edit" v-else></i></button>
                    </div>
                    <div class=" w-full md:w-1/3 py-2">
                        <label for="name" class="block font-bold">Name</label>
                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" v-if="editName" type="text" name="name" id="name" v-model="form.name">
                        <p v-else>{{siteconfig.name}}</p>
                        <button @click="editName = !editName" class="rounded my-1 bg-transparent border border-green-600 hover:bg-green-600 p-2 py-1 mx-3 transition ease-in-out duration-400 transform hover: -translate-x-2">                            
                            <i class="fas fa-times" v-if="editName"></i>
                            <i class="fas fa-edit" v-else></i></button>
        
                    </div>
                    <div class=" w-full md:w-2/3 py-2">
                        <label for="bio" class="block font-bold">Bio</label>
                        <textarea rows="5" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" v-if="editBio" name="bio" id="bio" v-model="form.bio"> </textarea>
                        <p v-else>{{siteconfig.bio}}</p>
                        <button @click="editBio = !editBio" class="rounded my-1 bg-transparent border border-green-600 hover:bg-green-600 p-2 py-1 mx-3 transition ease-in-out duration-400 transform hover: -translate-x-2">                            
                            <i class="fas fa-times" v-if="editBio"></i>
                            <i class="fas fa-edit" v-else></i>
                        </button>
        
                    </div>

                </div>
            </div>
            <div class="w-full md:w-1/6 flex flex-wrap justify-end my-4" v-if="hasChange">
                <div>
                    <button @click="updateSiteInformation" class="rounded sticky top-0 border border-green-600 bg-green-600 p-2 py-1 my-3 transition ease-in-out duration-400 transform hover: -translate-x-2">Update Site</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Button from '../../Jetstream/Button.vue'
export default {
  components: { Button },
    props: {
        socials:{
            type: Array,
            default: function(){
                return new Array()
            }
        }
    },
    data(){
        return {
            form: this.$inertia.form({
              socials: this.socials
            }, {
                bag: 'updateSocials',
            }),
        }
    },
    computed:{
        hasChange(){
            if(this.socials !== this.form.socials){
                return true;
            }

            return  false;
        }
    },
    methods:{
        updateSocials() {
            this.form.post(route('update-socials'),
            {
                preserveScroll: true,
                onSuccess: () => this.form.reset(),
                onFinish: () => this.form.reset(),
            })
              
        },
    }
    
}
</script>
