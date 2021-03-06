<template>
<manage>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col">
      <inertia-link
        :href="route('new-portfolio')"
        method="get"
        as="button"
        class="
          border border-green-600
          text-green-600
          px-4
          py-1
          bg-white
          rounded
          my-3
          self-end
        "
      >
        <i class="fas fa-plus"></i> New Portofolio</inertia-link
      >

      <div class="row" v-if="portofolios.length > 0">
        <div
          :key="index"
          class="
            flex flex-wrap
            bg-white
            rounded
            col-md-6
            shadow-sm
            m-4
            items-center
            py-3
            px-2
          "
          v-for="(portfolio, index) in portofolios"
        >
          <div class="flex items-center my-2 w-full md:w-1/4">
            <img
              class="rounded-full w-24 h-24 m-3 shadow overflow-hidden"
              :src="portfolio.avatar"
              :alt="portfolio.name + 'avatar'"
            />
            <!-- <h3 class="py-2 font-bold text-2xl underlined">{{portfolio.name}}</h3> -->
          </div>
          <section id="bio" class="w-full md:w-3/4">
            <div class="flex justify-between">
              <h3 class="font-bold text-xl underlined" v-if="portfolio.name">
                {{ portfolio.name }}
              </h3>
              <div class="w-full md:w-1/6">
                <jet-dropdown align="right" width="48">
                  <template #trigger>
                    <div class="clearfix">
                      <button
                        type="button"
                        class="
                          float-right
                          inline-flex
                          justify-center
                          rounded-md
                          bg-gray-200
                          border border-gray-300
                          shadow-sm
                          px-4
                          py-2
                          bg-white
                          text-sm
                          font-medium
                          text-gray-700
                          hover:bg-gray-50
                          focus:outline-none
                          focus:ring-2
                          focus:ring-offset-2
                          focus:ring-offset-gray-100
                          focus:ring-indigo-500
                        "
                        id="options-menu"
                        aria-haspopup="true"
                        aria-expanded="true"
                      >
                        Manage
                      </button>
                    </div>
                  </template>

                  <template #content>
                    <div class="flex flex-col">
                      <inertia-link
                        :href="route('edit-portfolio', { id: portfolio.id })"
                        method="get"
                        as="button"
                        class="
                          block
                          px-4
                          py-2
                          text-sm text-gray-700
                          hover:bg-green-300 hover:text-gray-900
                          w-full
                        "
                      >
                        <i class="fas fa-edit mr-2"></i> Update</inertia-link
                      >
                      <button
                        @click="prepareDelete(portfolio.id)"
                        class="
                          block
                          px-4
                          py-2
                          text-sm text-gray-700
                          hover:bg-yellow-700 hover:text-gray-900
                          w-full
                        "
                      >
                        <i class="fas fa-trash mr-2"></i>Delete
                      </button>
                    </div>
                  </template>
                </jet-dropdown>

                <!-- Delete Portofolio Confirmation Modal -->
                <jet-dialog-modal :show="deletePrompt" @close="closeModal">
                  <template #title> Delete portfolio </template>

                  <template #content>
                    <p>Are you sure you want to delete this portfolio?</p>
                  </template>

                  <template #footer>
                    <jet-secondary-button @click.native="closeModal">
                      Cancel
                    </jet-secondary-button>

                    <jet-button
                      class="ml-2"
                      @click.native="deletePortofolio"
                      :disabled="form.processing"
                    >
                      Delete
                    </jet-button>
                  </template>
                </jet-dialog-modal>
              </div>
            </div>
            <div class="py-3">{{ portfolio.bio }}</div>
          </section>
        </div>
      </div>
      <div v-else>
        <h3 class="text-gray-700">No Portofolios</h3>
      </div>
    </div>
    </manage>
</template>

<script>
import JetDropdown from "@/Jetstream/Dropdown";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetButton from "@/Jetstream/Button";
import Manage from './Manage.vue';

export default {
  components: {
    JetDropdown,
    JetSecondaryButton,
    JetButton,
    JetDialogModal,
    Manage,
  },
  props: {
    portofolios: {
      type: Array,
      default: new Array(),
    },
  },
  mounted() {
    console.log("Component mounted.", this.form);
  },
  data() {
    return {
      deletePrompt: false,
      form: this.$inertia.form({
        id: null,
      }),
    };
  },
  computed: {},
  methods: {
    prepareDelete(id) {
      this.form.id = id;
      this.deletePrompt = true;
    },
    closeModal() {
      this.form.id = null;
      this.deletePrompt = false;
    },
    deletePortofolio() {
      this.form.delete(route("destroy-portfolio"), {
        preserveScroll: true,
        onSuccess: () => this.closeModal(),
        onError: () => this.prepareDelete(this.form.id),
        onFinish: () => this.form.reset(),
      });
    },
  },
};
</script>
