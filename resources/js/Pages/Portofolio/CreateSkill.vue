<template>
    <jet-form-section @submitted="updatePortofolioSkill">
        <template #form>
            <!-- Name -->
            <div >
                <jet-label for="name" value="Skill Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="name" />
                <jet-input-error :message="form.errors.title" class="mt-2" />
            </div>

            <!-- Level -->
            <div >
                <jet-label for="level" value="Skill Level" />
                <jet-input id="level" type="number" class="mt-1 block w-full" v-model="form.percentage" />
                <jet-input-error :message="form.errors.percentage" class="mt-2" />
            </div>

            <!-- Description -->
            <div >
                <jet-label for="description" value="Skill Description" />
                <textarea id="description" class="mt-1 block w-full rounded-lg border-gray-300" v-model="form.description" />
                <jet-input-error :message="form.errors.description" class="mt-2" />
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
</template>

<script>
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/components/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import JetSectionBorder from '@/Jetstream/SectionBorder'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            JetSectionBorder
        },

        props: ['item'],

        mounted(){
            console.log("esd", this.$props.item);
        },

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    id: this.item.id,
                    portofolio_id: this.item.portofolio_id,
                    title: this.item.title,
                    percentage: this.item.percentage,
                    description: this.item.description,
                }),
            }
        },

        methods: {
            updatePortofolioSkill() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('update-skill'), {
                    errorBag: 'updatePortofolioSkill',
                    preserveScroll: true
                });
            },
         
        },
    }
</script>
