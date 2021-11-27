<template>
  <div>


    <div class="grid grid-cols-12 gap-6">
      <div class="col-span-12 xxl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
          <!-- BEGIN: General Report -->
          <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
              <date-stat :containerclasses="''" :imagehidden="true" />

             
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
              <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white rounded">
                <div
                  class="report-box zoom-in"
                  @click="pushTo('tasks?tab=all-tasks')"
                >
                  <div class="box p-5">
                    <div class="flex">
                      <div class="rounded-full bg-green-200 p-2">
                      </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">
                      {{ totalTasks }}
                    </div>
                    <div class="text-base text-gray-600 mt-1">
                      All Tickets
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white rounded">
                <div
                  class="report-box zoom-in"
                  @click="pushTo('ticket?tab=open-tickets')"
                >
                  <div class="box p-5">
                    <div class="flex flex-wrap">
                      <div class="rounded-full bg-yellow-200 p-2">
                        
                      </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">
                      {{ openTasks }}
                    </div>
                    <div class="text-base text-gray-600 mt-1">Open Tickets</div>
                  </div>
                </div>
              </div>
              <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white rounded">
                <div
                  class="report-box zoom-in"
                  @click="pushTo('tasks?tab=resolved-tasks')"
                >
                  <div class="box p-5">
                    <div class="flex">
                      <div class="rounded-full bg-blue-200 p-2">
                      </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">
                      {{ resolvedTasks }}
                    </div>
                    <div class="text-base text-gray-600 mt-1">
                      Resolved Tickets
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white rounded">
                <div
                  class="report-box zoom-in"
                  @click="pushTo('tasks?tab=closed-tasks')"
                >
                  <div class="box p-5">
                    <div class="flex">
                      <div class="rounded-full bg-green-200 p-2">
                        
                      </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">
                      {{ closedTasks }}
                    </div>
                    <div class="text-base text-gray-600 mt-1">
                      Closed Tickets
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          <!-- END: General Report -->
          <!-- BEGIN: Sales Report -->
          <div class="col-span-12 lg:col-span-5 mt-8">
            <div class="intro-y block sm:flex items-center h-10">
              <h4 class="truncate mr-5">Tasks Report</h4>
            </div>
            <div class="intro-y box p-5 mt-12 sm:mt-5">
              <div class="flex flex-col xl:flex-row xl:items-center">
                <div class="flex">
                  <div
                    class="
                      w-px
                      h-12
                      border border-r border-dashed border-gray-300
                      dark:border-dark-5
                      mx-4
                      xl:mx-5
                    "
                  ></div>
                  <div>
                    <div
                      class="
                        text-theme-19
                        dark:text-gray-300
                        text-lg
                        xl:text-xl
                        font-medium
                      "
                    >
                      {{ currentCount }}
                    </div>
                    <div class="mt-0.5 text-gray-600 dark:text-gray-600">
                      Tasks raised
                    </div>
                  </div>
                </div>
              </div>
              <div class="">
                Chart goes here
              </div>
            </div>
          </div>

          <!-- BEGIN: Weekly Top Products -->
          <div class="col-span-12 lg:col-span-7 mt-6">
            <div class="intro-y block sm:flex items-center h-10 my-3">
              <h4 class="truncate mr-5">Top Tasks</h4>
              <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                <button
                  class="
                    ml-3
                    btn
                    box
                    flex
                    items-center
                    text-gray-700
                    dark:text-gray-300
                  "
                >
                  <inertia-link href="tasks">View All Tasks</inertia-link>
                </button>
              </div>
            </div>

            <data-table
              :searchable="false"
              :loading="loading"
              :paginated="false"
              :dataObject="{}"
              :columns="[]"
            />
          </div>
          <!-- END: Weekly Top Products -->
        </div>
      </div>

    </div>
  </div>
</template>

<script>
import { defineComponent, ref, provide } from "vue";
import DateStat from "./DateStat.vue";

import moment from "moment";
import DataTable from './DataTable.vue';

export default {
  title: "Welcome: Calltronix Customer portal",
  components: {
    DateStat,
    DataTable,
  },
  data(){ return {
    openTasks: 0,
    resolvedTasks: 0,
    totalTasks: 0,
    closedTasks: 0,
    tickets: { },
    success: (state) => state.main.status.success,
    activity: (state) => state.main.dashboard.activity,
    loading: false,
    fromDate: (state) => state.main.dashboard.from,
    toDate: (state) => state.main.dashboard.to,
    currentCount: null,
    announcements:{},
    user: {},
  }},
  mounted() {
  },
  computed: {
    from() {
      return this.fromDate;
    },
    to() {
      return this.toDate;
    },
  },
  methods: {
    pushTo(name) {
      this.$inertia.get(name);
    },
    refreshStats() {
      console.log(this.SelectedDate);
      if (this.SelectedDate !== null) {
        let date = this.SelectedDate.split(" - ");
        this.start = this.createDate(date[0]);
        this.end = this.createDate(date[1]);
        this.fetchData({ from: this.start, to: this.end });
      }
    },
    moment: function () {
      return moment();
    },
    prevMonth(type = null) {
      var date = new Date();
      date.setDate(date.getDate() - 1);
      date.setFullYear(date.getFullYear());
      date = date.getMonth() + "/" + date.getDate() + "/" + date.getFullYear();
      if (type === "datestring") {
        date = new Date(date);
        console.log(
          "types",
          date.toDateString(),
          date.toLocaleString(),
          date.toDateString()
        );
        return this.getDate(date);
      }
      return date;
    },
  },

};
</script>
