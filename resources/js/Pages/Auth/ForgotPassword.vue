<template>
  <div>
    <!-- Hero Start -->
    <section class="bg-home d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 col-md-6">
            <div class="mr-lg-5">
              <img
                src="images/recovery.svg"
                class="img-fluid d-block mx-auto"
                alt=""
              />
            </div>
          </div>
          <div class="col-lg-5 col-md-6">
            <div class="card shadow rounded border-0">
              <div class="card-body">
                <h4 class="card-title text-center">Recover Account</h4>

                <form class="login-form mt-4"  @submit.prevent="submit">
                  <jet-validation-errors class="mb-4" />

                  <div class="row">
                    <div class="col-lg-12">
                      <p class="text-muted">
                        Please enter your email address. You will receive a link
                        to create a new password via email.
                      </p>
                      <div
                        v-if="status"
                        class="mb-4 font-medium text-sm text-green-600"
                      >
                        {{ status }}
                      </div>
                      <div class="form-group">
                        <label
                          >Email address
                          <span class="text-danger">*</span></label
                        >
                        <div class="position-relative">
                          <mail-icon class="fea icon-sm icons"></mail-icon>
                          <input
                            type="email"
                            class="form-control pl-5"
                            placeholder="Enter Your Email Address"
                            name="email"
                            v-model="form.email"
                            required
                            autofocus
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="flex items-center justify-end mt-4">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent 
                        font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 
                        focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out 
                        duration-150 btn btn-primary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Email Password Reset Link
                        </button>

                       
                      </div>
                    </div>
                    <div class="mx-auto">
                      <p class="mb-0 mt-3">
                        <small class="text-dark mr-2"
                          >Remember your password ?</small
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
  </div>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AlternativeAuthCard";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetValidationErrors from "@/Jetstream/ValidationErrors";

export default {
  components: {
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetLabel,
    JetValidationErrors,
  },

  props: {
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("password.email"));
    },
  },
};
</script>
