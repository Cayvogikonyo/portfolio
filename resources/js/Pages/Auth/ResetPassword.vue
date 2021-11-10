

<template>
  <div>
    <!-- Loader -->
    <div class="back-to-home rounded d-none d-sm-block">
      <inertia-link href="route(')" class="btn btn-icon btn-soft-primary">
        <home-icon class="icons"></home-icon>
      </inertia-link>
    </div>

    <!-- Hero Start -->
    <section class="bg-auth-home d-table w-100 py-3">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 col-md-6">
            <div class="mr-lg-5">
              <img
                src="/images/signup.svg"
                class="img-fluid d-block mx-auto"
                alt=""
              />
            </div>
          </div>
          <div class="col-lg-5 col-md-6">
            <div class="card shadow rounded border-0">
              <div class="card-body">
                <h4 class="card-title text-center">Reset Password</h4>
                <form class="login-form mt-4"  @submit.prevent="submit">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <div class="flex">
                            <jet-label for="password" value="Email" />
                          </div>
                        <div class="position-relative">
                          <input
                            type="email"
                            class="form-control pl-5"
                            placeholder="Email"
                            v-model="form.email" required autofocus 
                          />
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <jet-label for="password" value="New Password" />

                        <div class="position-relative">
                          <input
                            type="password"
                            class="form-control pl-5"
                            placeholder="Password"
                            v-model="form.password" required autofocus 
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <jet-label for="password_confirmation" value="Confirm Password" />
                        
                        <div class="position-relative">
                          <input
                            type="password"
                            class="form-control pl-5"
                            placeholder="Password Confirmation"
                            v-model="form.password_confirmation" required autofocus 
                          />
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12 my-2">
                      <button
                        class="btn btn-primary btn-block"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                      >
                        Reset Password
                      </button>
                    </div>
                    
                    <!--end col-->
                    <div class="mx-auto">
                      <p class="mb-0 mt-3">
                        <small class="text-dark mr-2"
                          >Already have an account ?</small
                        >
                        <inertia-link
                          :href="route('login')"
                          class="text-dark font-weight-bold"
                          >Sign in</inertia-link
                        >
                      </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!--end col-->
        </div>
        <!--end row-->
      </div>
      <!--end container-->
    </section>
    <!--end section-->
    <!-- Hero End -->
  </div>
</template>







<script>
import JetAuthenticationCard from "@/Jetstream/AlternativeAuthCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";
import {
  FacebookIcon,
  InstagramIcon,
  TwitterIcon,
  LinkedinIcon,
  HomeIcon,
  UserIcon,
  UserCheckIcon,
  MailIcon,
  KeyIcon,
} from "vue-feather-icons";

export default {
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetLabel,
    JetValidationErrors,
    FacebookIcon,
    InstagramIcon,
    TwitterIcon,
    LinkedinIcon,
    HomeIcon,
    UserIcon,
    UserCheckIcon,
    MailIcon,
    KeyIcon,
  },

  props: {
    email: String,
    token: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        token: this.token,
        email: this.email,
        password: "",
        password_confirmation: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("password.update"), {
        onFinish: () => this.form.reset("password", "password_confirmation"),
      });
    },
  },
};
</script>





























