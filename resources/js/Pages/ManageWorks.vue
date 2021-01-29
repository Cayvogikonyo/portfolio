<template>
    <app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col">
            <inertia-link :href="route('new-work')" method="get" as="button" class="border border-green-600 text-green-600 px-4 py-3 rounded my-3 self-end"> <i class="fas fa-plus"></i> New</inertia-link>
            <div class="md:grid md:grid-cols-3 md:gap-4" v-if="works.length > 0">
                <div :key="index" class="p-4 w-full flex flex-col my-2 md:my-auto bg-white rounded-lg shadow-lg py-3 px-2" v-for="(work, index) in works">
                    <div class="items-center my-2 w-full">
                        <img :src="work.header" :alt="work.title">
                        <h3 class="py-2 font-bold text-2xl underlined">{{work.title}}</h3>
                        <h5>{{work.role}}</h5>
                    </div>
                    <p v-if="work.excerpt">{{work.excerpt}}</p>
                    <jet-dropdown align="right" width="48">
                        <template #trigger>
                            <div class="clearfix">

                                <button type="button" class="float-right inline-flex justify-center rounded-md bg-gray-200 border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="options-menu" aria-haspopup="true" aria-expanded="true">
                                    ...
                                </button>
                            </div>
                        </template>

                        <template #content>

                            <div class="flex flex-col">
                                <inertia-link :href="route('update-work', work.id)" method="get" as="button" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-300 hover:text-gray-900 w-full"> <i class="fas fa-edit"></i> Update</inertia-link>
                                <button @click="prepareDelete(work.id)" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-400 hover:text-gray-900 w-full"> <i class="fa fa-trash-alt"></i>Delete</button>
                            </div>
                        </template>
                    </jet-dropdown>
                    <!-- Delete Confirmation Modal -->
                    <jet-dialog-modal :show="deletePrompt" @close="closeModal">
                        <template #title>
                            Delete project.
                        </template>

                        <template #content>
                            <p>Are you sure you want to delete this project?</p>
                        </template>

                        <template #footer>
                            <jet-secondary-button @click.native="closeModal">
                                Cancel
                            </jet-secondary-button>

                            <jet-button class="ml-2" @click.native="deleteProject" :disabled="form.processing">
                                Delete
                            </jet-button>
                        </template>
                    </jet-dialog-modal>
                </div>
            </div>
            <div v-else>
                <h3 class="text-center">No projects found.</h3>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import JetButton from '@/Jetstream/Button'

    export default {
        components: {
            AppLayout,
            JetDropdown,
            JetDialogModal,
            JetSecondaryButton,
            JetButton
        },
        props:{
            works: {
                type: Array,
                default: new Array(),
            }
        },
        mounted() {
            console.log('Component mounted.');
        },
        data() {
            return {
                deletePrompt: false,
                form: this.$inertia.form({
                    id: null,
                })
            }
        },
        methods: {
            prepareDelete(id){
                this.form.id = id;
                this.deletePrompt = true;
            },
            closeModal(){
                this.form.id = null;
                this.deletePrompt = false;
            },
            deleteProject(){
                this.form.delete(route('destroy-work'), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.prepareDelete(this.form.id),
                    onFinish: () => this.form.reset(),
                })
             
            },
            
        }
    }
</script>
