<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-8">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg p-4">
                    <dashboard />
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import Dashboard from '../components/NewDashboard'

    export default {
        components: {
            AppLayout,
            Welcome,
            Dashboard
        },
    }
</script>
