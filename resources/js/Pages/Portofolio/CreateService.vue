<template>
    <jet-form-section @submitted="updatePortofolioService">
        <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="name" />
                <jet-input-error :message="form.errors.title" class="mt-2" />
            </div>

            <!-- Icon -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="icon" value="Icon" />
                <jet-input id="icon" type="icon" class="mt-1 block w-full" v-model="form.icon" />
                <jet-input-error :message="form.errors.icon" class="mt-2" />
            </div>

            <!-- Description -->
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
                    icon: this.item.icon,
                    description: this.item.description,
                    photo: null,
                }),
            }
        },

        methods: {
            updatePortofolioService() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('update-service'), {
                    errorBag: 'updatePortofolioService',
                    preserveScroll: true
                });
            },
        },
    }
</script>
