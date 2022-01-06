<template>
    <button :type="type"  v-bind:class="classes" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-1 px-4 border border-green-500 hover:border-transparent rounded">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'button',
            },
            classes: {
                type: String,
                default: null,
            },
        }
    }
</script>