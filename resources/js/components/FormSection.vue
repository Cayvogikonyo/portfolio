<template>
    <div>
        <form @submit.prevent="$emit('submitted')">
            <div class="shadow overflow-hidden sm:rounded-md my-2">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div>
                        <slot name="form"></slot>
                    </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6" v-if="hasActions">
                    <slot name="actions"></slot>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import JetSectionTitle from '@/Jetstream/SectionTitle'

    export default {
        components: {
            JetSectionTitle,
        },

        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    }
</script>
