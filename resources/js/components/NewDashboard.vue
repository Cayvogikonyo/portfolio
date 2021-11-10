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
              <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div
                  class="report-box zoom-in"
                  @click="pushTo('tasks?tab=all-tasks')"
                >
                  <div class="box p-5">
                    <div class="flex">
                      <div class="rounded-full bg-green-200 p-2">
                        <LayersIcon class="report-box__icon" />
                      </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">
                      {{ totalTasks }}
                    </div>
                    <div class="text-base text-gray-600 mt-1">
                      All Tasks
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div
                  class="report-box zoom-in"
                  @click="pushTo('ticket?tab=open-tickets')"
                >
                  <div class="box p-5">
                    <div class="flex flex-wrap">
                      <div class="rounded-full bg-yellow-200 p-2">
                        <BookOpenIcon
                          class="report-box__icon text-yellow-600"
                        />
                      </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">
                      {{ openTasks }}
                    </div>
                    <div class="text-base text-gray-600 mt-1">Open Tasks</div>
                  </div>
                </div>
              </div>
              <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div
                  class="report-box zoom-in"
                  @click="pushTo('tasks?tab=resolved-tasks')"
                >
                  <div class="box p-5">
                    <div class="flex">
                      <div class="rounded-full bg-blue-200 p-2">
                        <ThumbsUpIcon class="report-box__icon text-blue-500" />
                      </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">
                      {{ resolvedTasks }}
                    </div>
                    <div class="text-base text-gray-600 mt-1">
                      Resolved Tasks
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div
                  class="report-box zoom-in"
                  @click="pushTo('tasks?tab=closed-tasks')"
                >
                  <div class="box p-5">
                    <div class="flex">
                      <div class="rounded-full bg-green-200 p-2">
                        <CheckCircleIcon
                          class="report-box__icon text-yellow-600"
                        />
                      </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">
                      {{ closedTasks }}
                    </div>
                    <div class="text-base text-gray-600 mt-1">
                      Closed Tasks
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
              <h2 class="text-lg font-medium truncate mr-5">Ticket Report</h2>
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
                      Tickets raised
                    </div>
                  </div>
                </div>
              </div>
              <div class="">
                <mixed-line-chart
                  :data="statsChart"
                  :height="169"
                  class="mt-6"
                />
              </div>
            </div>
          </div>

          <!-- BEGIN: Weekly Top Products -->
          <div class="col-span-12 lg:col-span-7 mt-6">
            <div class="intro-y block sm:flex items-center h-10 my-3">
              <h2 class="text-lg font-medium truncate mr-5">Top Tickets</h2>
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
                  <ArrowRightIcon class="hidden sm:block w-4 h-4 mr-2" />
                  <inertia-link href="ticket">View Tickets</inertia-link>
                </button>
              </div>
            </div>

            <data-table
              :searchable="false"
              :loading="loading"
              :paginated="false"
              :dataObject="tickets.data"
              :columns="ticketColumns"
            />
          </div>
          <!-- END: Weekly Top Products -->
        </div>
      </div>

      <div class="col-span-12 xxl:col-span-3">
        <div class="xxl:border-l border-theme-5 -mb-10 pb-10">
          <div class="xxl:pl-6 grid grid-cols-12">
            <!-- BEGIN: Recent Activities -->
            <div
              class="
                col-span-12
                md:col-span-6
                flex flex-wrap
                xl:col-span-6
                xxl:col-span-12
                mt-3
              "
            >
              <div class="intro-x w-full flex items-center h-10 w-full">
                <h2 class="text-lg font-medium truncate mr-5">
                  Recent Activities
                </h2>
                <!-- <a
                      href=""
                      class="ml-auto text-theme-1 dark:text-theme-10 truncate"
                  >Show More</a
                  > -->
              </div>
              <div
                class="w-full flex flex-wrap report-timeline mt-5 relative"
                v-if="activity"
              >
                <div
                  class="intro-x w-full relative flex items-center mb-3"
                  :key="index"
                  v-for="(item, index) in activity"
                >
                  <div class="report-timeline__image">
                    <div
                      class="
                        w-10
                        h-10
                        flex-none
                        image-fit
                        rounded-full
                        overflow-hidden
                      "
                    >
                      <img
                        class="overflow-hidden bg-white rounded-full"
                        :alt="item.uname"
                        :src="item.user.profile_photo_url"
                      />
                    </div>
                  </div>
                  <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                    <div class="flex items-center">
                      <div class="font-medium">
                        {{ item.uname }}
                      </div>
                      <div class="text-xs text-gray-500 ml-auto">
                        {{ TwelveHourTimestamp(item.created_at) }}
                      </div>
                    </div>
                    <div class="text-gray-600 mt-1">{{ item.title }}</div>
                    <div class="text-gray-600 mt-1">{{ item.description }}</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END: Recent Activities -->
            <!-- BEGIN: Important Notes -->
            <div
              class="
                col-span-12
                md:col-span-6
                xl:col-span-6
                xxl:col-span-12
                xl:col-start-1 xl:row-start-1
                xxl:col-start-auto xxl:row-start-auto
                mt-3
              "
            >
              <div class="intro-x flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-auto">
                  Announcements
                </h2>
                <button
                  data-carousel="important-notes"
                  data-target="prev"
                  class="
                    tiny-slider-navigator
                    btn
                    px-2
                    border-gray-400
                    text-gray-700
                    dark:text-gray-300
                    mr-2
                  "
                  @click="prevImportantNotes"
                >
                  <ChevronLeftIcon class="w-4 h-4" />
                </button>
                <button
                  data-carousel="important-notes"
                  data-target="next"
                  class="
                    tiny-slider-navigator
                    btn
                    px-2
                    border-gray-400
                    text-gray-700
                    dark:text-gray-300
                    mr-2
                  "
                  @click="nextImportantNotes"
                >
                  <ChevronRightIcon class="w-4 h-4" />
                </button>
              </div>
              <div class="mt-5 intro-x" v-if="announcements">
                <div
                  class="box my-2 zoom-in"
                  v-for="ann in announcements"
                  :key="ann.id"
                >
                  <!-- <TinySlider ref-key="importantNotesRef"
                    > -->
                  <div class="p-5">
                    <div class="text-base font-medium truncate">
                      {{ ann.title }}
                    </div>
                    <div class="text-gray-500 mt-1">
                      {{
                        moment(ann.created_at).format("MMMM Do YYYY, h:mm:ss a")
                      }}
                    </div>
                    <div class="text-gray-600 text-justify mt-1">
                      <img class="max-h-24" :src="ann && ann.image_url" />
                      {{ ann.description }}
                    </div>
                    <div class="font-medium flex mt-5">
                      <button
                        @click="goTo('announcement')"
                        type="button"
                        class="btn btn-secondary py-1 px-2"
                      >
                        View All
                      </button>
                      <!-- <button
                              type="button"
                              class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto"
                          >
                            Dismiss
                          </button> -->
                    </div>
                  </div>
                  <!-- <div class="p-5"

                      >
                      {{ann}}
                        <div class="text-base font-medium truncate">
                          Manage your tickets with ease.
                        </div>
                        <div class="text-gray-500 mt-1">20 Hours ago</div>
                        <div class="text-gray-600 text-justify mt-1">
                          You can create tickets and have them resolve in no time.
                        </div>
                        <div class="font-medium flex mt-5">
                          <button type="button" class="btn btn-secondary py-1 px-2">
                            View Notes
                          </button>
                          <button
                              type="button"
                              class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto"
                          >
                            Dismiss
                          </button>
                        </div>
                      </div>
                      <div class="p-5">
                        <div class="text-base font-medium truncate">
                          Get Notified
                        </div>
                        <div class="text-gray-500 mt-1">20 Hours ago</div>
                        <div class="text-gray-600 text-justify mt-1">
                          Receive real time notifications for your created tickets.
                        </div>
                        <div class="font-medium flex mt-5">
                          <button type="button" class="btn btn-secondary py-1 px-2">
                            View Notes
                          </button>
                          <button
                              type="button"
                              class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto"
                          >
                            Dismiss
                          </button>
                        </div>
                      </div> -->
                  <!-- </TinySlider> -->
                </div>
              </div>
            </div>
            <!-- END: Important Notes -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, provide } from "vue";
import DateStat from "./DateStat.vue";

import moment from "moment";

export default {
  title: "Welcome: Calltronix Customer portal",
  components: {
    DateStat,
  },
  data(){ return {
    openTasks: 0,
    resolvedTasks: 0,
    totalTasks: 0,
    closedTasks: 0,
    tickets: { },
    success: (state) => state.main.status.success,
    activity: (state) => state.main.dashboard.activity,
    loading: (state) => state.main.dashboard.loading,
    fromDate: (state) => state.main.dashboard.from,
    toDate: (state) => state.main.dashboard.to,
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
