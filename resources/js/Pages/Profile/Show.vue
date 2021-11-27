<script>
import {
    ArrowUpIcon,
    FacebookIcon,
    InstagramIcon,
    TwitterIcon,
    LinkedinIcon,
    GithubIcon,
    YoutubeIcon,
    GitlabIcon,
    MailIcon,
    UserPlusIcon,
    UsersIcon,
    MessageCircleIcon,
    BellIcon,
    ToolIcon,
    PhoneIcon,
    BookmarkIcon,
    ItalicIcon,
    GiftIcon,
    MapPinIcon,
    GlobeIcon
} from 'vue-feather-icons';
import AppLayout from '../../Layouts/AppLayout.vue';
import { VBPopover, VBTooltip } from "bootstrap-vue";


/**
 * Account-profile component
 */
export default {
    directives: {
        'b-popover': VBPopover,
        'b-tooltip': VBTooltip
    },
    data() {
        return {}
    },
    components: {
        ArrowUpIcon,
        FacebookIcon,
        InstagramIcon,
        TwitterIcon,
        LinkedinIcon,
        GithubIcon,
        YoutubeIcon,
        GitlabIcon,
        MailIcon,
        UserPlusIcon,
        UsersIcon,
        MessageCircleIcon,
        BellIcon,
        ToolIcon,
        PhoneIcon,
        BookmarkIcon,
        ItalicIcon,
        GlobeIcon,
        GiftIcon,
        MapPinIcon,
        AppLayout
    }
}
</script>

<template>
<app-layout>

    <!-- Hero Start -->
    <section class="bg-profile d-table w-100 bg-primary" style="background: url('images/account/bg.png') center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card public-profile border-0 rounded shadow" style="z-index: 1;">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3 text-md-left text-center">
                                    <img :src="portfolio.avatar" :alt="portfolio.name + 'avatar'" class="avatar overflow-hidden avatar-large rounded-circle shadow d-block mx-auto">
                                </div>
                                <!--end col-->

                                <div class="col-lg-10 col-md-9">
                                    <div class="row align-items-end">
                                        <div class="col-md-7 text-left md:text-left mt-4 mt-sm-0">
                                            <h3 class="title mb-0">{{portfolio.name}}</h3>
                                            <small class="text-muted h6 mr-2">{{portfolio.title}}</small>
                                            <ul class="list-inline mb-0 mt-3">
                                        
                                                <li class="list-inline-item text-muted">
                                                        {{user.name}}
                                                </li>
                                            </ul>
                                        </div>
                                        <!--end col-->
                                        <div class="col-md-5 text-md-right text-center">
                                            <ul class="list-unstyled social-icon social mb-0 mt-4">
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded" v-b-tooltip.hover title="Add Friend">
                                                        <user-plus-icon class="fea icon-sm fea-social"></user-plus-icon>
                                                    </a></li>
                                                <li class="list-inline-item ml-1"><a href="javascript:void(0)" class="rounded" v-b-tooltip.hover title="Messages">
                                                        <message-circle-icon class="fea icon-sm fea-social"></message-circle-icon>
                                                    </a></li>
                                                <li class="list-inline-item ml-1"><a href="javascript:void(0)" class="rounded" v-b-tooltip.hover title="Notifications">
                                                        <bell-icon class="fea icon-sm fea-social"></bell-icon>
                                                    </a></li>
                                                <li class="list-inline-item ml-1">
                                                    <inertia-link href="/account-setting" class="rounded" v-b-tooltip.hover title="Settings">
                                                        <tool-icon class="fea icon-sm fea-social"></tool-icon>
                                                    </inertia-link>
                                                </li>
                                            </ul>
                                            <!--end icon-->
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--ed container-->
    </section>
    <!--end section-->
    <!-- Hero End -->
    <!-- Profile Start -->
    <section class="mt-24">
        <div class="container mt-lg-3">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 d-lg-block d-none">
                    <div class="sidebar sticky-bar p-4 rounded shadow">

                        <div class="widget mt-4 pt-2">
                            <h5 class="widget-title">Projects :</h5>
                            <div class="progress-box mt-4">
                                <h6 class="title text-muted">Progress</h6>
                                <div class="progress">
                                    <div class="progress-bar position-relative bg-primary" style="width:50%;">
                                        <div class="progress-value d-block text-muted h6">24 / 48</div>
                                    </div>
                                </div>
                            </div>
                            <!--end process box-->
                        </div>

                        <div class="widget">
                            <div class="row">
                                <div class="col-6 mt-4 pt-2">
                                    <div @click="showing = 'profile'" :class="{ 'bg-blue-300 text-white': showing === 'profile' }" class="accounts active rounded d-block shadow text-center py-3">
                                        <span class="pro-icons h3 text-muted"><i class="uil uil-dashboard"></i></span>
                                        <h6 class="title text-dark h6 my-0">Profile</h6>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-6 mt-4 pt-2">
                                    <div @click="showing = 'edit-info'" :class="{ 'bg-blue-300': showing === 'edit-info' }" class="accounts rounded d-block shadow text-center py-3">
                                        <span class="pro-icons h3 text-muted"><i class="uil uil-users-alt"></i></span>
                                        <h6 class="title text-dark h6 my-0">User Profile</h6>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-6 mt-4 pt-2">
                                    <div @click="showing = 'works'" :class="{ 'bg-blue-300': showing === 'works' }"  class="accounts rounded d-block shadow text-center py-3">
                                        <span class="pro-icons h3 text-muted"><i class="uil uil-file"></i></span>
                                        <h6 class="title text-dark h6 my-0">Works</h6>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-6 mt-4 pt-2">
                                    <div @click="showing = 'password'" :class="{ 'bg-blue-300': showing === 'password' }"  class="accounts rounded d-block shadow text-center py-3">
                                        <span class="pro-icons h3 text-muted"><i class="uil uil-envelope-star"></i></span>
                                        <h6 class="title text-dark h6 my-0">Password Management</h6>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-6 mt-4 pt-2">
                                    <inertia-link :href="route('manage-site')" class="accounts rounded d-block shadow text-center py-3">
                                        <span class="pro-icons h3 text-muted"><i class="uil uil-setting"></i></span>
                                        <h6 class="title text-dark h6 my-0">Manage Site</h6>
                                    </inertia-link>
                                </div>
                                <!--end col-->

                                <div class="col-6 mt-4 pt-2">
                                    <inertia-link href="/auth-login-three" class="accounts rounded d-block shadow text-center py-3">
                                        <span class="pro-icons h3 text-muted"><i class="uil uil-sign-out-alt"></i></span>
                                        <h6 class="title text-dark h6 my-0">Logout</h6>
                                    </inertia-link>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>


                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-8 col-12">
                    <div class="border-bottom pb-4">
                        <h5>{{portfolio.name}}</h5>
                        <p class="text-muted mb-0">{{portfolio.bio}}</p>
                    </div>

                    <div class="border-bottom pb-4">
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <h5>Personal Details :</h5>
                                <div class="mt-4">
                                    <div class="media align-items-center">
                                        <mail-icon class="fea icon-ex-md text-muted mr-3"></mail-icon>
                                        <div class="media-body">
                                            <h6 class="text-primary mb-0">Email :</h6>
                                            <a href="javascript:void(0)" class="text-muted">{{user.email}}</a>
                                        </div>
                                    </div>
                                    <div class="media align-items-center mt-3">
                                        <bookmark-icon class="fea icon-ex-md text-muted mr-3"></bookmark-icon>
                                        <div class="media-body">
                                            <h6 class="text-primary mb-0">Skills :</h6>
                                            <a href="javascript:void(0)" class="text-muted">html</a>, <a href="javascript:void(0)" class="text-muted">css</a>, <a href="javascript:void(0)" class="text-muted">js</a>, <a href="javascript:void(0)" class="text-muted">mysql</a>
                                        </div>
                                    </div>
                                    
                                    <div class="media align-items-center mt-3">
                                        <globe-icon class="fea icon-ex-md text-muted mr-3"></globe-icon>
                                        <div class="media-body">
                                            <h6 class="text-primary mb-0">Website :</h6>
                                            <a href="javascript:void(0)" class="text-muted">{{user.fullurl}}</a>
                                        </div>
                                    </div>
                                    <div class="media align-items-center mt-3">
                                        <gift-icon class="fea icon-ex-md text-muted mr-3"></gift-icon>
                                        <div class="media-body">
                                            <h6 class="text-primary mb-0">Joined :</h6>
                                            <p class="text-muted mb-0">2nd March, 1996</p>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-md-6 mt-4 pt-2 pt-sm-0">
                                <h5>Experience :</h5>

                                <div v-bind:key="index" v-for="(item, index) in portfolio.experiences" class="media key-feature align-items-center p-3 rounded shadow mt-4">
                                    <img src="images/job/Circleci.svg" class="avatar avatar-ex-sm" alt="">
                                    <div class="media-body content ml-3">
                                        <h4 class="title mb-0">{{item.role}}</h4>
                                        <p class="text-muted mb-0">{{item.from}} to {{item.to}}</p>
                                        <p class="text-muted mb-0"><a href="javascript:void(0)" class="text-primary">{{item.title}}</a> </p>
                                    </div>
                                </div>

                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>

                  
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Profile End -->
    <!--end section-->

    <!-- Back to top -->
</app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {
    props: ['user'],
    components:{
        AppLayout
    },
    mounted(){
        this.getPortfolio();
    },
    data() {
        return {
            myportfolio: null,
            loading: false,
            showing: 'profile'
        }
    },
    computed:{
        portfolio(){
            // if(this.myportfolio !== null)
                return this.myportfolio
            // else 
            //     return  {}
        }
    },
    methods:{
          getPortfolio() {
            var _this = this;
            this.loading = true;
            axios.post('/get-profile')
            .then(function (response) {
                console.log("Posts", response.data);
                _this.myportfolio = response.data.portfolio;
                _this.loading = false;

            });
            console.log( "adadasd",this.myportfolio);
        },
    }
}
</script>

<style>

</style>