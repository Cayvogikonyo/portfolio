<template>
    <jet-form-section @submitted="updateBioInformation">
        <template #form>
            <!-- Profile Photo -->
            <div  >
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            ref="photo"
                            @change="updatePhotoPreview">

                <jet-label for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div class="mt-2" v-show="!photoPreview">
                    <img :src="portofolio.avatar" :alt="portofolio.name" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" v-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <jet-secondary-button class="mt-2 mr-2" type="button" @click.native.prevent="selectNewPhoto">
                    Select A New Photo
                </jet-secondary-button>

                <jet-secondary-button type="button" class="mt-2" @click.native.prevent="deletePhoto" v-if="portofolio.avatar">
                    Remove Photo
                </jet-secondary-button>

                <jet-input-error :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Name -->
            <div >
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Title -->
            <div >
                <jet-label for="name" value="Title" />
                <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="title" />
                <jet-input-error :message="form.errors.title" class="mt-2" />
            </div>

            <!-- Bio -->
            <div >
                <jet-label for="name" value="Bio" />
                <textarea id="bio" class="mt-1 block w-full rounded border-gray-300" rows="4" v-model="form.bio" autocomplete="bio" />
                <jet-input-error :message="form.errors.bio" class="mt-2" />
            </div>

            <!-- Bio -->
            <div >
                <tags-component :chosen="form.tags" :suggestions="tags" v-on:add-tag="addTag"></tags-component>
                {{form.tags}}
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
    import TagsComponent from '@/components/TagsComponent.vue';

    export default {
        components: {
            JetActionMessage,
            JetButton,
            TagsComponent,
            JetSectionBorder,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        props: {
            portofolio: {
                type: Object,
                default: () => {
                    return {}
                }
            },
        },

        data() {
            var tags = this.portofolio ? this.portofolio.tags : [];
            var id = this.portofolio ? this.portofolio.id : null;
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    name: this.portofolio.name,
                    title: this.portofolio.title,
                    bio: this.portofolio.bio,
                    portofolio_id: id,
                    photo: null,
                    tags
                }),
                tags: [],
                photoPreview: null,
            }
        },

        methods: {
            updateBioInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('update-bio'), {
                    errorBag: 'updateBioInformation',
                    preserveScroll: true
                });
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

            addTag(item){
                this.form.tags.push(item.name)
            },

            deletePhoto() {
                this.$inertia.delete(route('destroy-bio-avatar'), {
                    preserveScroll: true,
                    onSuccess: () => (this.photoPreview = null),
                });
            },
        },
    }
</script>
