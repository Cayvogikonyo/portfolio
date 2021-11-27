<template>
    <app-layout>
        <div>
            <div>
                <ul class="container-filter list-inline mb-0 filter-options text-center py-3">
                    <jet-dropdown-link :href="route('manage-site')" :active="route().current('manage-site')" class="list-inline-item categories-name border text-dark rounded"  :class="route().current('manage-site') ? 'bg-blue-400 text-white' : ''">
                        Site
                    </jet-dropdown-link>
                    <jet-dropdown-link :href="route('manage-portfolio')" class="list-inline-item categories-name border text-dark rounded"  :class="route().current('manage-portfolio') ? 'bg-blue-400 text-white' : ''">
                        Portfolios
                    </jet-dropdown-link>
                    <jet-dropdown-link :href="route('manage')"  class="list-inline-item categories-name border text-dark rounded" :class="route().current('manage') ? 'bg-blue-400 text-white' : ''">
                        Blog
                    </jet-dropdown-link>
                    <jet-dropdown-link :href="route('manage-categories')" class="list-inline-item categories-name border text-dark rounded" :class="route().current('manage-categories') ? 'bg-blue-400 text-white' : ''">
                        Blog Categories
                    </jet-dropdown-link>   
                    
                    <jet-dropdown-link :href="route('work-categories')" class="list-inline-item categories-name border text-dark rounded" :class="route().current('work-categories') ? 'bg-blue-400 text-white' : ''">
                        Work Categories
                    </jet-dropdown-link>                    
                     <jet-dropdown-link :href="route('manage-works')" class="list-inline-item categories-name border text-dark rounded"  :class="route().current('manage-works') ? 'bg-blue-400 text-white' : ''">
                        Works
                    </jet-dropdown-link>
                   
                 
                    
                   
                </ul>
            </div>

            <div>
                <main>
                    <slot></slot>
                </main>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '../Layouts/AppLayout.vue'
import JetDropdownLink from '@/Jetstream/DropdownLink'

export default {
  components: { AppLayout, JetDropdownLink },

}
</script>

<style>

</style>