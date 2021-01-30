<template>
    <app-layout>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg p-4">
                    <h3 class="font-bold text-lg my-2 underlined">Blog Categories</h3>
                    <div class="flex justify-end my-2" v-if="!addCategory">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 mx-4 border border-blue-500 hover:border-transparent rounded" title="Add new room" @click="addCategory = !addCategory">
                            <i class="fas fa-plus-square"></i> Add Category
                        </button>
                    </div>
                    <div class="clearfix" v-else>
                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" @click.prevent="addCategory = !addCategory">
                            Cancel
                        </button>
                    </div>
                    <div class="sm:rounded-lg" v-if="addCategory">
                        <jet-form-section @submitted="createCategory">
                            <template #title>
                                    <h3 class="text-white">New Category</h3>
                            </template>

                            <template #form>
                                <div class="md:grid md:grid-cols-2 md:gap-4">
                                    <div >
                                        <jet-label for="categoryName" value="Category Name" />
                                        <jet-input id="categoryName" type="text" class="mt-1 block w-full" v-model="form.name" ref="name" autocomplete="category" />
                                        <jet-input-error :message="errors.name" class="mt-2" />
                                    </div>

                                </div>
                            
                            </template>

                            <template #actions>
                                <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                                    Saved.
                                </jet-action-message>                    

                                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Submit
                                </jet-button>
                            </template>
                        </jet-form-section>
                    </div>

                    <div v-else>
                        <table class="category-auto w-full">
                            <thead class="border">
                                <th class="px-4 py-2" id="category_width">#</th>
                                <th class="px-4 py-2">Category Name</th>
                                <th class="px-4 py-2">Actions</th>
                            </thead>

                            <tbody v-if="categories && categories.length > 0">
                                <tr v-bind:key="index" v-for="(item, index) in categories">
                                    <td class="border px-4 py-2 ">{{index+1}}</td>
                                    <td class="border px-4 py-2 ">{{item.name}}</td>
                                    <td class="border px-4 py-2 ">
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
                                                    <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-300 hover:text-gray-900 w-full" > <i class="fas fa-cancel"></i> Set Unavailable </button>
                                                    <button @click="deleteCategory(item.id)" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-400 hover:text-gray-900 w-full" > <i class="fas fa-trash"></i> Delete Item</button>
                                                </div>
                                            </template>
                                        </jet-dropdown> 
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr><td class="border px-4 py-2" colspan="5">You have 0 categories added.</td></tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
    </app-layout>
</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/components/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import AppLayout from '@/Layouts/AppLayout'
    import JetDropdown from '@/Jetstream/Dropdown'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            AppLayout,
            JetDropdown
        },
        props: {
            errors: Object,
            categories: Array,
        },
        data() {
            return {
                addCategory: false,
                form: this.$inertia.form({
                    name: '',
                }, {
                    bag: 'createCategory',
                }),
                hotel: null,
            }
        },
        methods: {
            createCategory() {
                this.form.post(route('save-category'),{
                    preserveScroll: true,
                    onSuccess: () => {this.addCategory = false},
                    onFinish: () => this.form.reset(),
                })
            },
            deleteCategory(id) {
                this.form.post(route('delete-category', {'id' : id}),{
                    preserveScroll: true,
                    onSuccess: () => {this.addCategory = false},
                    onFinish: () => this.form.reset(),
                })
            },
        },
    }
</script>
