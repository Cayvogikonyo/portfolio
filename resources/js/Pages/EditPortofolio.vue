<template>
    <app-layout>
        <div class="w-full md:w-7/12 mx-auto flex flex-col">
            <div>
                <update-bio :portofolio="computeportofolio" />
                <jet-section-border />
            </div>

            <div >
                <h3 class="font-bold my-2">Skills</h3>
                <div ref="addSkills my-2">
                    <create-skill :key="index" :item="item" v-for="(item, index) in skills" v-on:skillcreated="addedSkills = []"/>
                </div>
                <div class="w-full flex flex-wrap justify-center my-2">
                    <button class="p-4 py-3 shadow bg-gray-400 rounded"  @click="addSkill"><i class="fas fa-plus"></i></button>
                </div>
                <jet-section-border />
            </div>
            <div >
                <h3 class="font-bold my-3">Experiences</h3>
                <div ref="addExperiences my-2">
                    <create-experience :key="index" :item="item" v-for="(item, index) in experiences" v-on:experiencecreated="addedExperiences = []"/>
                </div>
                <div class="w-full flex flex-wrap justify-center my-2">
                    <button class="p-4 py-3 shadow bg-gray-400 rounded"  @click="addExperience"><i class="fas fa-plus"></i></button>
                </div>
                <jet-section-border />
            </div>
            <div>
                <h3 class="font-bold my-3">Services</h3>
                <div ref="addServices my-2">
                    <create-service  :key="index" :item="item" v-for="(item, index) in services" v-on:servicecreated="addedServices = []"/>
                </div>
                <div class="w-full flex flex-wrap justify-center my-2">
                    <button class="p-4 py-3 shadow bg-gray-400 rounded"  @click="addService"><i class="fas fa-plus"></i></button>
                </div>
                <jet-section-border />
            </div>
            <div >
                <h3 class="font-bold my-3">Clients</h3>
                <div ref="addClients my-2">
                    <create-client  :key="index" :item="item" v-for="(item, index) in clients" v-on:clientcreated="addedClients = []"/>
                </div>
                <div class="w-full flex flex-wrap justify-center my-2">
                    <button class="p-4 py-3 shadow bg-gray-400 rounded" @click="addClient"><i class="fas fa-plus"></i></button>
                </div>
                <jet-section-border />
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import CreateClient from './Portofolio/CreateClient';
    import UpdateBio from './Portofolio/UpdateBio.vue';
    import CreateService from './Portofolio/CreateService.vue';
    import CreateSkill from './Portofolio/CreateSkill.vue';
    import CreateExperience from './Portofolio/CreateExperience.vue';
    import JetSectionBorder from '@/Jetstream/SectionBorder'

    export default {
        components: {
            AppLayout,
            CreateClient,
            CreateExperience,
            CreateSkill,
            CreateService,
            UpdateBio,
            JetSectionBorder
        },
        props:{
            portofolio: {
                type: Object,
                default: () => {
                    return null
                },
            }
        },
        mounted() {
            console.log('Component mounted.', this.portofolio);
        },
        data() {
            return {
                addedSkills: [],
                addedExperiences: [],
                addedServices:[],
                addedClients: [],
            }
        },
        computed:{
            skills() {
                return !this.portofolio ? this.addedSkills : this.portofolio.skills.concat(this.addedSkills);
            },
            computeportofolio() {
                if(this.portofolio == null){
                    return {};
                }
                return this.portofolio;
            },
            experiences() {
                return !this.portofolio ? this.addedExperiences : this.portofolio.experiences.concat(this.addedExperiences);
            },
            services() {
                return !this.portofolio ? this.addedServices : this.portofolio.services.concat(this.addedServices);
            },
            clients() {
                return !this.portofolio ? this.addedClients : this.portofolio.clients.concat(this.addedClients);
            },
        },
        methods: {
            async addSkill(){
                this.addedSkills.push({
                    description: "",
                    id: null,
                    percentage: "",
                    portofolio_id: this.$props.portofolio?.id,
                    title: "",
                    url: null,
                    verifier_title: ""
                });
            },
            async addService(){
                this.addedServices.push({
                    description: '',
                    icon: null,
                    id: null,
                    portofolio_id: this.$props.portofolio?.id,
                    title: ''
                });
                console.log(this.services);
            },
            async addExperience(){
                this.addedExperiences.push({
                    description: "",
                    from: "",
                    id: null,
                    portofolio_id: this.$props.portofolio?.id,
                    title: "",
                    to: ""
                });
            },
            async addClient(){
                this.addedClients.push({
                    description: '',
                    url: null,
                    icon: null,
                    id: null,
                    portofolio_id: this.$props.portofolio?.id,
                    title: ''
                });
            },
        }
    }
</script>
