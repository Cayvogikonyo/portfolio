<template>
    <jet-form-section @submitted="updatePortofolioClient">
        <template #form>
            
            <!-- Name -->
            <div >
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="name" />
                <jet-input-error :message="form.errors.title" class="mt-2" />
            </div>

            <!-- Client Photo -->
            <div  >
                <!-- Client Photo File Input -->
                <input type="file" class="hidden"
                            ref="photo"
                            @change="updatePhotoPreview">

                <jet-label for="photo" value="Client Image" />

                <!-- Current Client Photo -->
                <div class="mt-2" v-show="! photoPreview">
                    <img :src="item.icon" :alt="item.title" class="rounded-lg border border-gray-300 h-24 w-24 object-cover">
                </div>

                <!-- New Client Photo Preview -->
                <div class="mt-2" v-show="photoPreview">
                    <span class="block rounded-lg border border-gray-300 w-24 h-24"
                          :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <jet-secondary-button class="mt-2 mr-2" type="button" @click.native.prevent="selectNewPhoto">
                    Select A New Photo
                </jet-secondary-button>

                <jet-secondary-button type="button" class="mt-2" @click.native.prevent="deletePhoto" v-if="item.icon">
                    Remove Photo
                </jet-secondary-button>

                <jet-input-error :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Description -->
            <div >
                <jet-label for="description" value="Description" />
                <textarea id="description" class="mt-1 block w-full rounded border-gray-300" rows="4" v-model="form.description" />
                <jet-input-error :message="form.errors.description" class="mt-2" />
            </div>

            <!-- Website/Url -->
            <div >
                <jet-label for="name" value="Website/Url" />
                <jet-input id="name" type="text" class="mt-1 block w-full" aria-placeholder="http://example.com" v-model="form.url" autocomplete="url" />
                <jet-input-error :message="form.errors.url" class="mt-2" />
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
                    url: this.item.url,
                    icon: null,
                    description: this.item.description,
                }),

                photoPreview: null,
            }
        },

        methods: {
            updatePortofolioClient() {
                if (this.$refs.photo) {
                    this.form.icon = this.$refs.photo.files[0]
                }

                this.form.post(route('update-client'), {
                    errorBag: 'updatePortofolioClient',
                    preserveScroll: true,
                    onSuccess: () => this.emitCreated(),
                });
            },

            emitCreated() {
                if(this.item.id === null){
                    this.$emit('clientcreated');
                }
            },

            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.photo.files[0]);
            },

            deletePhoto() {
                this.$inertia.delete(route('delete-client-photo', this.$props.item.id), {
                    preserveScroll: true,
                    onSuccess: () => (this.photoPreview = null),
                });
            },
        },
    }
</script>
