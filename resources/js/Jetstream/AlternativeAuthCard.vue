<template>
    <div>
        <!-- Loader -->
        
        <div class="back-to-home rounded d-none d-sm-block">
            <a href="/" class="btn btn-icon btn-primary"> <home-icon></home-icon> </a>
        </div>

        <!-- Hero Start -->
        <section class="cover-user bg-white">
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-lg-5 cover-my-30 order-2">
                        <div class="cover-user-img d-flex align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card login-page p-0 md:mx-4 lg:mx-0 border-0" style="z-index: 1">
                                        <div class="card-body ">
                                            <slot />

                                       
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div> <!-- end about detail -->
                    </div> <!-- end col -->    

                    <div class="col-lg-7 offset-lg-4 padding-less img order-1 visible md:invisible lg:visible" style="background-image:url('images/login.svg')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->    
                </div><!--end row-->
            </div><!--end container fluid-->
        </section><!--end section-->
        <!-- Hero End -->
    </div>
</template>

<script>
import { HomeIcon } from "vue-feather-icons";

export default {
    components:{
        HomeIcon
    }
}
</script>
