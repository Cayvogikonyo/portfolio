<template>
  <div>
    <!-- Hero Start -->
    <section class="bg-home d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 col-md-6">
            <h4 class="py-2 text-center">Sign In</h4>

            <jet-validation-errors class="mb-4" />

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
              {{ status }}
            </div>

            <form @submit.prevent="submit">
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-3">
                    <label class="form-label"
                      >Your Email <span class="text-danger">*</span></label
                    >
                    <div class="form-icon position-relative">
                      <input
                        type="email"
                        class="form-control ps-4"
                        placeholder="Email"
                        name="email"
                        required=""
                        v-model="form.email"
                      />
                    </div>
                  </div>
                </div>
                <!--end col-->

                <div class="col-lg-12">
                  <div class="mb-3">
                    <label class="form-label"
                      >Password <span class="text-danger">*</span></label
                    >
                    <div class="form-icon position-relative">
                      <i data-feather="key" class="fea icon-sm icons"></i>
                      <input
                        type="password"
                        class="form-control ps-4"
                        placeholder="Password"
                        required=""
                        v-model="form.password"
                      />
                    </div>
                  </div>
                </div>
                <!--end col-->

                <div class="col-lg-12">
                  <div class="d-flex justify-content-between">
                    <div class="mb-3">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          value=""
                          id="flexCheckDefault"
                          v-model="form.remember"
                        />
                        <label class="form-check-label" for="flexCheckDefault"
                          >Remember me</label
                        >
                      </div>
                    </div>
                   
                  </div>
                </div>
                <!--end col-->

                <div class="col-lg-12 mb-0">
                  <div class="d-grid">
                    <button
                      class="
                        inline-flex
                        items-center
                        px-4
                        py-2
                        border border-transparent
                        font-semibold
                        text-xs text-white
                        uppercase
                        tracking-widest
                        hover:bg-gray-700
                        active:bg-gray-900
                        focus:outline-none
                        focus:border-gray-900
                        focus:shadow-outline-gray
                        transition
                        ease-in-out
                        duration-150
                        btn btn-primary
                      "
                      :class="{ 'opacity-25': form.processing }"
                      :disabled="form.processing"
                    >
                      Sign in
                    </button>
                  </div>
                </div>
                <!--end col-->

                <!--
                    <div class="col-lg-12 mt-4 text-center">
                    <h6>Or Login With</h6>
                    <div class="row">
                        <div class="col-6 mt-3">
                        <div class="d-grid">
                            <a href="javascript:void(0)" class="btn btn-light"
                            ><i class="mdi mdi-facebook text-primary"></i> Facebook</a
                            >
                        </div>
                        </div>

                        <div class="col-6 mt-3">
                        <div class="d-grid">
                            <a href="javascript:void(0)" class="btn btn-light"
                            ><i class="mdi mdi-google text-danger"></i> Google</a
                            >
                        </div>
                        </div>
                    </div>
                    </div>
                    -->

                <div class="col-12 text-center">
                  <p class="mb-0 mt-3">
                    <inertia-link
                      v-if="canResetPassword"
                      :href="route('password.request')"
                      class="
                        underline
                        text-sm text-gray-600
                        hover:text-gray-900
                      "
                    >
                      Forgot your password?
                    </inertia-link>
                    <!--<small class="text-dark me-2">Don't have an account ?</small>
                        <a href="auth-cover-signup.html" class="text-dark fw-bold"
                        >Sign Up</a
                        >-->
                  </p>
                </div>
                <!--end col-->
              </div>
              <!--end row-->
            </form>
          </div>
          <div class="col-lg-7 col-md-6">
            <div class="mr-lg-5">
              <img
                src="images/login.svg"
                class="img-fluid d-block mx-auto"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AlternativeAuthCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";
import { UserIcon } from "vue-feather-icons";

export default {
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
    UserIcon
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("login"), {
          onFinish: () => this.form.reset("password"),
        });
    },
  },
};
</script>
