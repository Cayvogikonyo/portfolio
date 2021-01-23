<template>
    <jet-form-section @submitted="updatePortofolioExperience">
        <template #form>
            
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Title" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="name" />
                <jet-input-error :message="form.errors.title" class="mt-2" />
            </div>
            <!-- From -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="from" value="From" />
                <jet-input id="from" type="text" class="mt-1 block w-full" v-model="form.from" autocomplete="from" />
                <jet-input-error :message="form.errors.from" class="mt-2" />
            </div>
            <!-- To -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="to" value="To" />
                <jet-input id="to" type="text" class="mt-1 block w-full" v-model="form.to" autocomplete="to" />
                <jet-input-error :message="form.errors.to" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="description" value="Description" />
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

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    id: this.item.id,
                    portofolio_id: this.item.portofolio_id,
                    title: this.item.title,
                    from: this.item.from,
                    to: this.item.to,
                    description: this.item.description,
                    photo: null,
                }),
            }
        },

        methods: {
            updatePortofolioExperience() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('update-experience'), {
                    errorBag: 'updatePortofolioExperience',
                    preserveScroll: true
                });
            },
        },
    }
</script>
