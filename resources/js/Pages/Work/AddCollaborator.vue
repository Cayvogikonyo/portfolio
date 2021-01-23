<template>
    <div>
            <!-- Profile Photo -->
        <div class="px-4 py-5 bg-white sm:p-6" >
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden"
                        ref="avatar"
                        @change="updatePhotoPreview">

            <jet-label for="avatar" value="Photo" />

            <!-- New Profile Photo Preview -->
            <div class="mt-2" v-show="photoPreview">
                <span class="block rounded-full w-20 h-20"
                        :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <jet-secondary-button class="mt-2 mr-2" type="button" @click.native.prevent="selectNewPhoto">
                Select A New Photo
            </jet-secondary-button>

        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="name" value="Name" />
            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
        </div>

        <!-- Role -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="role" value="Role" />
            <jet-input id="client_role" type="text" class="mt-1 block w-full" v-model="form.role" autocomplete="role" />
        </div>

        <!-- Url -->
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="url" value="Url/Website" />
            <jet-input id="client_url" type="text" class="mt-1 block w-full" v-model="form.url" autocomplete="url" />
        </div>

        <div class="flex flex-wrap justify-end mt-3">
            <jet-secondary-button class="mx-2" @click.native.prevent="skip">
                Cancel
            </jet-secondary-button>
            <jet-button class="mx-2" @click.native.prevent="updateCollaborator">
                Continue
            </jet-button>
        </div>
        
    </div>
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

        props: {
            item : {
                type: Object,
                default: function () {
                    return {  }
                },
            }
        },

        data() {
            return {
                form: {
                    name: this.item.name,
                    avatarUrl: this.item.avatarUrl,
                    url: this.item.url,
                    role: this.item.role,
                    avatar: null,
                },
                photoPreview: null
            }
        },

        methods: {
            updateCollaborator() {

                this.$emit('collaborator', {data: this.form, avatarUrl: this.photoPreview});
                this.form = {
                    name: '',
                    avatarUrl: '',
                    url: '',
                    role: '',
                    avatar: null,
                }
                if(this.$refs.avatar){
                    this.photoPreview = null;
                }
            },

            skip() {
                this.form = {
                    name: '',
                    avatarUrl: '',
                    url: '',
                    role: '',
                    avatar: null,
                }
                if(this.$refs.avatar){
                    this.photoPreview = null;
                }
                this.$emit('skip', {});
            },

            selectNewPhoto() {
                this.$refs.avatar.click();
            },

            updatePhotoPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.avatar.files[0]);
                this.form.avatar = this.$refs.avatar.files[0];
            },
        },
    }
</script>
