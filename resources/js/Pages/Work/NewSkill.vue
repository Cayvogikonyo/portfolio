<template>
<div>
    <button type="button" @click="addingSkills = true" class="border border-green-600 text-green-600 px-4 py-1 rounded self-end bg-white"> <i class="fas fa-plus"></i> New Article</button>

    <jet-dialog-modal :show="addingSkills" @close="addingSkills = false">

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
    </jet-dialog-modal>
</div>
</template>

<script>
import JetFormSection from '@/components/FormSection'

export default {
    components:{
        JetFormSection
    },
    data(){
        return {
            addingSkills: false
        }
    }
}
</script>

<style>

</style>