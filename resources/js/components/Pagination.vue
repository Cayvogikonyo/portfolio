<template>
    <div
        class="intro-y col-span-12 flex flex-wrap sm:flex-row items-center"
        :class="reversed ? 'sm:flex-row-reverse flex-between':''"
      >

        <ul class="pagination"
          :class="reversed ? 'mr-0 ml-auto':''">
          <li v-if="(data.current_page - 1) >= 1">
            <a class="pagination__link" href=""  @click.prevent="navigateTo(data.first_page)">
              <ChevronsLeftIcon class="w-4 h-4" />
            </a>
          </li>
          <li v-if="(data.current_page - 1) >= 1">
            <a class="pagination__link" href=""  @click.prevent="navigateTo(data.current_page - 1)">
              <ChevronLeftIcon class="w-4 h-4" />
            </a>
          </li>

          <li v-if="(data.current_page - 1) >= 1">
            <a class="pagination__link" href="" @click.prevent="navigateTo(data.current_page - 1)">{{data.current_page - 1}}</a>
          </li>
          <li>
            <a class="pagination__link pagination__link--active" href=""  @click.prevent="navigateTo(data.current_page)">{{data.current_page}}</a>
          </li>
          <li v-if="data.current_page + 1 <= data.last_page">
            <a class="pagination__link" href="" @click.prevent="navigateTo(data.current_page + 1)">{{data.current_page + 1}}</a>
          </li>
          <li v-if="data.current_page + 1 <= data.last_page">
            <a class="pagination__link" href="" @click.prevent="navigateTo(data.current_page + 1)">
              <ChevronRightIcon class="w-4 h-4" />
            </a>
          </li>
          <li  @click.prevent="navigateTo(data.last_page)" v-if="data.current_page + 1 <= data.last_page">
            <a class="pagination__link" href="">
              <ChevronsRightIcon class="w-4 h-4" />
            </a>
          </li>
        </ul>
        
        <div class="hidden md:block mx-auto text-gray-600">
          Showing {{data.from}} to {{data.to}} of {{data.total}} entries
        </div>

        <select class="w-20 form-select box mt-3 sm:mt-0" v-model="per_page" @change="triggerUpdate()">
          <option :selected="data.per_page === 10" :value="10">10</option>
          <option :selected="data.per_page === 25" :value="25">25</option>
          <option :selected="data.per_page === 35" :value="35">35</option>
          <option :selected="data.per_page === 50" :value="50">50</option>
        </select>
      </div>
</template>

<script>
export default {
    props:{
        data: {
            type: Object,
            default: ()=>{
                return {}
            }
        },
        reversed: {
            type: Boolean,
            default: false
        },
    },
    data(){
      return {
        per_page: 10
      }
    },
    methods:{
      navigateTo(pageNumber){
        let data = {
          'per_page' : this.per_page,
          'page': pageNumber
        };
        this.$emit('navigate', data);
      },
      triggerUpdate(){
        let data = {
          'per_page' : this.per_page
        };
        this.$emit('triggerUpdate', data);
      }
    }
}
</script>

<style>

</style>