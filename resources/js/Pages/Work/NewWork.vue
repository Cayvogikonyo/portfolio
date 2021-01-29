<template>
    <app-layout>
        <div class="w-full md:w-10/12 mx-auto flex flex-col">
            <jet-form-section @submitted="updateWorkInformation">
                <template #form>
                    <h2 class="font-bold text-center">{{id ? "Edit" : "New"}} Work</h2>
                    <div class="flex flex-wrap">
                        <!-- Header-->
                        <div class="w-full md:w-5/12 md:px-4">
                            <div>
                                <!-- HeaderFile Input -->
                                <input type="file" class="hidden"
                                            ref="header"
                                            @change="updatePhotoPreview">

                                <jet-label class="font-bold" for="header" value="Header" />

                                <!-- Current Header-->
                                <div class="mt-2" v-if="hasheader">
                                    <img :src="work.header" :alt="work.title" class="w-full object-cover">
                                </div>

                                <!-- New HeaderPreview -->
                                <div class="mt-2" v-else-if="photoPreview">
                                    <span class="block rounded-sm w-full h-40"
                                        :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                                    </span>
                                </div>

                                <div class="h-40 bg-green-100 flex justify-center items-center" @click.prevent="selectNewPhoto" v-else>
                                    <p>Select header</p>
                                </div>

                                <jet-secondary-button class="mt-2 mr-2" type="button" @click.native.prevent="selectNewPhoto">
                                    Select A New Photo
                                </jet-secondary-button>

                                <jet-secondary-button type="button" class="mt-2" @click.native.prevent="deletePhoto" v-if="hasheader">
                                    Remove Photo
                                </jet-secondary-button>

                                <jet-input-error :message="form.errors.header" class="mt-2" />
                            </div>
                            <!-- Icon-->
                            <div>
                                <!-- HeaderFile Input -->
                                <input type="file" class="hidden"
                                            ref="icon"
                                            @change="updateIconPreview">

                                <jet-label class="font-bold w-full" for="icon" value="Icon" />

                                <!-- Current Header-->
                                <div class="mt-2 rounded-sm w-full h-24 w-24" v-if="hasicon">
                                    <img :src="work.icon" :alt="work.title" class="w-full object-cover">
                                </div>

                                <!-- New HeaderPreview -->
                                <div class="mt-2" v-else-if="iconPreview">
                                    <span class="block rounded-full h-24 w-24"
                                        :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + iconPreview + '\');'">
                                    </span>
                                </div>

                                <div class="h-24 w-24 my-2 rounded-full bg-green-100 flex justify-center items-center" @click.prevent="selectNewIcon" v-else>
                                    <p>Select icon</p>
                                </div>

                                <jet-secondary-button class="mt-2 mr-2" type="button" @click.native.prevent="selectNewIcon">
                                    Select A New Icon
                                </jet-secondary-button>

                                <jet-secondary-button type="button" class="mt-2" @click.native.prevent="deleteIcon" v-if="hasicon">
                                    Remove Icon
                                </jet-secondary-button>

                                <jet-input-error :message="form.errors.header" class="mt-2" />
                            </div>
                        </div>
                        <div class="w-full md:w-7/12">

                            <!-- Title -->
                            <div >
                                <jet-label class="font-bold" for="name" value="Title" />
                                <jet-input id="title" type="text" class="mt-1 block w-full border-0" placeholder="Project Z" v-model="form.title" autocomplete="title" />
                                <jet-input-error :message="form.errors.title" class="mt-2" />
                            </div>

                            <!-- Role -->
                            <div >
                                <jet-label class="font-bold" for="name" value="Role" />
                                <jet-input id="role" type="text" class="mt-1 block w-full border-0" :placeholder="'Role e.g. Project Manager'" v-model="form.role" autocomplete="role" />
                                <jet-input-error :message="form.errors.role" class="mt-2" />
                            </div>

                            <!-- Excerpt -->
                            <div >
                                <jet-label class="font-bold" for="name" value="Excerpt" />
                                <textarea id="excerpt" class="mt-1 block w-full rounded-lg border-0" placeholder="Excerpt(Displayed on project list)" v-model="form.excerpt" autocomplete="excerpt" />
                                <jet-input-error :message="form.errors.bio" class="mt-2" />
                            </div>

                            <!-- Excerpt -->
                            <div >
                                <jet-label class="font-bold" for="url" value="Url" />
                                <jet-input id="url" type="text" class="mt-1 block w-full border-0" placeholder="https://example.com" v-model="form.url" autocomplete="url" />
                                <jet-input-error :message="form.errors.url" class="mt-2" />
                            </div>
                        </div>

                        <div class="inline-editor w-full rounded">
                            <jet-label class="font-bold" for="url" value="Work Description" />
                            <div class="myck-content border-2 border-gray-200 rounded">
                                <ckeditor 
                                :editor="editor"
                                :config="postConfig"
                                v-model="form.description">
                                </ckeditor>
                            </div>
                            <jet-input-error :message="form.errors.description" class="mt-2" />
                        </div>

                        <div class="w-full md:w-1/2 py-3">
                            <jet-label class="font-bold" for="url" value="Team Collaborators" /> 
                            <div class="flex flex-wrap">
                                <div :key="index" class="flex flex-wrap" v-for="(item, index) in form.collaborators">
                                    <span class="block rounded-full mx-3 w-20 h-20"
                                        :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + collabAvatars[index]+ '\');'">
                                    </span>
                                    <div>
                                        <h3 class="py-2 font-bold text-2xl underlined">{{item.name}}</h3>
                                        <p class="py-2 font-bold text-2xl">{{item.role}}</p>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="w-full flex flex-wrap justify-center my-2">
                                <button class="p-4 py-3 shadow bg-gray-400 rounded" @click.prevent="addingCollaborator = true"><i class="fas fa-plus"></i></button>
                            </div>

                            <!-- Add Collabolator Modal -->
                            <jet-dialog-modal :show="addingCollaborator" @close="addingCollaborator = false">
                                <template #title>
                                    <div class="p-2">
                                        New Collaborator.
                                    </div>
                                </template>

                                <template #content>
                                    <add-collaborator  v-on:skip="addingCollaborator = false" v-on:collaborator="addCollaborator"/>
                                </template>

                                <template #footer>
                                </template>
                            </jet-dialog-modal>
                        </div>
                        <div class="w-full md:w-1/2 py-3" v-if="id && work.portofolio_id">
                            <div class="p-2 px-4 mx-2 rounded-lg shadow flex">
                                <img :src="work.portofolio.avatar" :alt="work.portofolio.name" class="rounded-full h-20 w-20 object-cover">
                                <div class="px-4 relative underlined">
                                    <h3 class="font-bold">{{work.portofolio.name}}</h3>
                                    <h4>{{work.portofolio.title}}</h4>
                                </div>
                            </div> 
                        </div>
                        <div class="w-full md:w-1/2 py-3" v-else>
                            <jet-label class="font-bold" for="url" value="Attach to portofolio" />      
                            <div class="w-full flex flex-wrap justify-center my-2" v-if="!form.portofolio_id">
                                <button class="p-4 py-3 shadow bg-gray-400 rounded" @click.prevent="addingPortofolio = true"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="p-2 px-4 mx-2 rounded-lg shadow flex" v-else>
                                <img :src="portofolios[portofolioIndex].avatar" :alt="portofolios[portofolioIndex].name" class="rounded-full h-20 w-20 object-cover">
                                <div class="px-4 relative underlined">
                                    <h3 class="font-bold">{{portofolios[portofolioIndex].name}}</h3>
                                    <h4>{{portofolios[portofolioIndex].title}}</h4>
                                </div>
                            </div>      
                            <!-- Add Portofolio Modal -->
                            <jet-dialog-modal :show="addingPortofolio" @close="addingPortofolio = false">
                                <template #title>
                                    <div class="p-2">
                                        Attach Portofolio.
                                    </div>
                                </template>

                                <template #content>
                                    <add-portofolio :portofolios="portofolios" v-on:skip="addingPortofolio = false" :portofolio_id="form.portofolio_id" v-on:portofolio="attachPortofolio"/>
                                </template>

                            </jet-dialog-modal>    
                        </div>
                        <div class="w-full md:flex" v-if="hasportofolio">
                            <div class="w-full md:w-1/2 p-3" >
                                <jet-label class="font-bold" for="url" value="Skills Used" />      
                                <div class="p-2 px-4 m-2 bg-blue-200 rounded-lg shadow flex justify-between" :key="index" v-for="(item, index) in form.skills">
                                    <h3 class="font-bold">{{item.title}}</h3>
                                    <button class="p-2 text-red-500" @click.prevent="removeSkill(index)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div> 
                                <div class="w-full flex flex-wrap justify-center my-2">
                                    <button class="p-4 py-3 shadow bg-gray-400 rounded" @click.prevent="addingSkills = true"><i class="fas fa-plus"></i></button>
                                </div>
                                <!-- Add Skill Modal -->
                                <jet-dialog-modal :show="addingSkills" @close="addingSkills = false">
                                    <template #title>
                                        <div class="p-2">
                                            Add Skill.
                                        </div>
                                    </template>

                                    <template #content>
                                        <add-skill :skills="skills" :selectedSkills="form.skills" v-on:skip="addingSkills = false" v-on:skill="attachSkill"/>
                                    </template>

                                    <template #footer>

                                    </template>
                                </jet-dialog-modal>
                            </div>
                            <div class="w-full md:w-1/2 p-3" >                           
                                <jet-label class="font-bold" for="url" value="Service Type" />        
                                <div class="p-2 px-4 m-2 bg-blue-200 rounded-lg shadow flex justify-between" :key="index" v-for="(item, index) in form.services">
                                    <h3 class="font-bold">{{item.title}}</h3>
                                    <button class="p-2 text-red-500" @click.prevent="removeService(index)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="w-full flex flex-wrap justify-center my-2">
                                    <button class="p-4 py-3 shadow bg-gray-400 rounded" @click.prevent="addingService = true"><i class="fas fa-plus"></i></button>
                                </div>
                                <!-- Add Service Modal -->
                                <jet-dialog-modal :show="addingService" @close="addingService = false">
                                    <template #title>
                                        <div class="p-2">
                                            Add Service.
                                        </div>
                                    </template>

                                    <template #content>
                                        <add-service :services="services" :selectedservices="form.services" v-on:skip="addingService = false" v-on:service="attachService"/>
                                    </template>

                                    <template #footer>
                                    </template>
                                </jet-dialog-modal>
                            </div>
                            <div class="w-full md:w-1/2 p-3" >
                                <jet-label class="font-bold" for="url" value="Client Type" />        
                                <div class="p-2 px-4 m-2 bg-blue-200 rounded-lg shadow flex justify-between" :key="index" v-for="(item, index) in form.clients">
                                    <h3 class="font-bold">{{item.title}}</h3>
                                    <button class="p-2 text-red-500" @click.prevent="removeClient(index)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div> 
                                <div class="w-full flex flex-wrap justify-center my-2">
                                    <button class="p-4 py-3 shadow bg-gray-400 rounded" @click.prevent="addingClient = true"><i class="fas fa-plus"></i></button>
                                </div>
                                <!-- Add Client Modal -->
                                <jet-dialog-modal :show="addingClient" @close="addingClient = false">
                                    <template #title>
                                        <div class="p-2">
                                            Add Client.
                                        </div>
                                    </template>

                                    <template #content>
                                        <add-client :clients="clients" :selectedclients="form.clients" v-on:skip="addingClient = false" v-on:client="attachClient"/>
                                    </template>

                                    <template #footer>
                                    </template>
                                </jet-dialog-modal>
                            </div>
                        </div>
                       
                    </div>

                </template>

                <template #actions>
                    <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                        Saved.
                    </jet-action-message>

                    <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Save
                    </jet-button>
                </template>
            </jet-form-section>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetSectionBorder from '@/Jetstream/SectionBorder'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/components/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import CKEditor from '@ckeditor/ckeditor5-vue';
    import InlineEditor from '@ckeditor/ckeditor5-build-inline';
    import AddCollaborator from './AddCollaborator.vue'
    import AddPortofolio from './AddPortofolio.vue'
    import AddSkill from './AddSkill.vue'
    import AddService from './AddService.vue'
    import AddClient from './AddClient.vue'

    const STATUS_INITIAL = 0, STATUS_SAVING = 1, STATUS_SUCCESS = 2, STATUS_FAILED = 3;

    export default {
        components: {
            AppLayout,
            JetSectionBorder,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetActionMessage,
            JetDialogModal,
            JetSecondaryButton,
            ckeditor: CKEditor.component,
            InlineEditor,
            AddCollaborator,
            AddPortofolio,
            AddSkill,
            AddService,
            AddClient
        },
        props:{
            work: {
                type: Object,
                default: function(){
                    return {}
                },
            },
            portofolios: {
                type: Array,
                default: function(){
                    return new Array;
                },
            },
            skills: {
                type: Array,
                default: function(){
                    return new Array;
                },
            },
            services: {
                type: Array,
                default: function(){
                    return new Array;
                },
            },
            clients: {
                type: Array,
                default: function(){
                    return new Array;
                },
            },
            id: {
                type: Number,
                default: null,
            }
        },
        mounted() {
            console.log('Component mounted.', this.work);
        },
        data() {
            return {
                editor: InlineEditor,
                postConfig: {
                    placeholder: "Work Description",
                    uploadUrl: 'https://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json'
                },
                form: this.$inertia.form({
                    _method: 'PUT',
                    title: this.work.title,
                    description: this.work.description,
                    role: this.work.role,
                    url: this.work.url,
                    excerpt: this.work.excerpt,
                    id: this.id,
                    portofolio_id: null,
                    client_id: null,
                    collaborators: [],
                    tags: [],
                    skills: [],
                    clients: [],
                    services: [],
                    icon: null,
                    header: null,
                }),
                collabAvatars: [],
                portofolioIndex: null,
                photoPreview: null,
                iconPreview: null,
                addingCollaborator: false,
                addingPortofolio: false,
                addingSkills: false,
                addingClient: false,
                addingService: false,
            }
        },
        computed:{
            hasheader(){
                return !this.photoPreview && this.work.avatar;
            },
            hasicon(){
                return !this.iconPreview && this.work.icon;
            },
            hasportofolio(){
                return !this.form.portofolio_id || this.work.portofolio_id;
            },
        },
        methods: {
            teamCollab(index){
                const reader = new FileReader();
                var url = '';
                reader.onload = (e) => {
                    url = e.target.result;
                };
                if(this.form.collaborators[index]){
                    reader.readAsDataURL(this.form.collaborators[index].avatar);
                }
                return url;
            },
            updateWorkInformation() {
                if (this.$refs.header) {
                    this.form.header = this.$refs.header.files[0]
                }
                if (this.$refs.icon) {
                    this.form.icon = this.$refs.icon.files[0]
                }

                this.form.post(route('store-work'), {
                    errorBag: 'updateWorkInformation',
                    preserveScroll: true
                });
            },

            selectNewPhoto() {
                this.$refs.header.click();
            },

            selectNewIcon() {
                this.$refs.icon.click();
            },

            updatePhotoPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.header.files[0]);
            },

            updateIconPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.iconPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.icon.files[0]);
            },

            deletePhoto() {
                if(this.hasheader){
                    this.$inertia.delete(route('destroy-work-header'), {
                        preserveScroll: true,
                        onSuccess: () => (this.photoPreview = null),
                    });
                }else{
                    this.form.header = null;
                    this.photoPreview = null;
                }
            },

            deleteIcon() {
                if(this.hasheader){
                    this.$inertia.delete(route('destroy-work-icon'), {
                        preserveScroll: true,
                        onSuccess: () => (this.iconPreview = null),
                    });
                }else{
                    this.form.icon = null;
                    this.iconPreview = null;
                }
            },

            attachSkill(item) {
                this.addingSkills = false;
                this.form.skills = null;
                this.form.skills = item.data;
            },

            attachService(item) {
                this.addingService = false;
                this.form.services = item.data;
            },

            attachClient(item) {
                this.addingClient = false;
                this.form.clients = item.data;
            },

            attachPortofolio(item) {
                this.addingPortofolio = false;
                this.portofolioIndex = item.index;
                this.form.portofolio_id = item.portofolio_id;
            },

            addCollaborator(item) {
                this.addingCollaborator = false;
                this.form.collaborators.push(item.data);
                this.collabAvatars.push(item.avatarUrl);
            },

            removeSkill(index) {
                this.form.skills.splice(index, 1);
            },

            removeCollabolator(index) {
                this.form.skills.splice(index, 1);
                this.collabAvatars.splice(index, 1);
            },

            removeService(index) {
                this.form.services.splice(index, 1);
            },

            removeClient(index) {
                this.form.clients.splice(index, 1);
            },
        }
    }
</script>
