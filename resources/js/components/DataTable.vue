<template>
    <div class="intro-y col-span-12 bg-white dark:bg-gray-800 p-4 rounded " >
      <div class="col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <div v-if="searchable" class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
          <div class="sm:w-5/6 md:w-72 relative text-gray-700 dark:text-gray-300 shadow">
            <input
                type="text"
                class="form-control w-full box pr-10 placeholder-theme-13"
                placeholder="Search..."
                v-model="search"
                v-on:keyup="setTimer"

            />
            <SearchIcon
                class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
            />
          </div>
        </div>
        <div class="sm:invisible md:visible md:ml-24 flex-grow md:mx-6 sm:invisible md:visible">
          <!-- BEGIN: Pagination -->
          <pagination :data="paginationData" v-if="paginated" v-on:navigate="navigateTo" v-on:trigger-update="triggerUpdate"/>
          <!-- END: Pagination -->
        </div>

      </div>


      <div class="overflow-auto">
        <table class="table my-2 ">
          <thead>
          <tr>
            <th class="whitespace-nowrap" :class="item.name === 'actions' ? 'text-center':''" :key="index" v-for="(item, index) in columns">
              {{item.label ? item.label:item.name}}
              <i class="fas"
                :class="
                sortKey === item.name
                    ? sortOrders[item.name] > 0
                    ? 'fa-arrow-up'
                    : 'fa-arrow-down'
                    : 'fa-arrow-up-down'
                "
            ></i>
            </th>
            <th class="whitespace-nowrap text-center" v-if="actions.length > 0">Actions</th>
          </tr>
          </thead>

          <tbody v-if="loading || filteredData && filteredData.length === 0">
            <tr
              class="intro-x sm:flex sm:flex-col md:flex-row"
              v-if="loading"
            >
              <td :colspan="columns.length + 1">

                <div
                  class="col-span-6 sm:col-span-3 xl:col-span-2 flex flex-col justify-end items-center py-3"
                >
                  <loading-icon icon="tail-spin" class="w-8 h-8" />
                  <div class="text-center text-xs mt-2">Syncing</div>
                </div>
              </td>
            </tr>
            <tr
              class="intro-x"
              v-else-if="filteredData.length === 0"
            >
              <td :colspan="columns.length + 1">

                <div >
                  No Data Found
                </div>

              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr
                v-for="(item, index) in filteredData"
                :class="index % 2 === 0 ? 'bg-gray-300 dark:bg-dark-1':''"
                :key="index"
                class="intro-x"
            >
              <td :key="index" v-for="(column, index) in columns">
                <div
                    class="flex items-center justify-center"
                    :class="{
                      'text-theme-9': item[column.name] === 1,
                      'text-theme-6': !item[column.name] !== 1
                    }"
                    v-if="column.type === 'boolean'"
                >
                  <CheckSquareIcon class="w-4 h-4 mr-2" />
                  {{ item[column.name] === 1 ? "Active" : "Inactive" }}
                </div>



                <div v-else>
                  <inertia-link :href="column.link ? url + '/' + column.urlValue + '/' + item[column.append] : ''" class="font-medium whitespace-nowrap" :class="columnClasses(column, getDisplayValue(column, item))">
                      {{getDisplayValue(column, item)}}
                  </inertia-link>


                </div>
                <p class="font-sm" v-if="column.subtitle">
                  <span class="font-sm whitespace-nowrap">
                    {{item[column.subtitle]}}
                  </span>
                </p>

              </td>
              <td class="flex flex-wrap"  v-if="actions.length > 0">
                <div class="flex justify-center items-center text-blue-600 uppercase  p-2">
                  <div :key="index" v-for="(action, index) in actions">
                    {{item['permission_group.name']}}
                    <div v-if="action.conditional === true &&  !action.negative&& action.value === item[action.condition] || action.conditional === true && action.negative === true && action.value !== item[action.condition] || !action.conditional">
                      <inertia-link v-if="action.route || action.url" :href="action.route ? route(action.route, item[action.append]) : action.url + '/' + item[action.append]" class="flex rounded items-center mr-3 p-1 btn btn-primary text-white" href="javascript:;" @click.prevent="triggerEmit(action, item)" >
                        <EditIcon class="w-4 h-4 mr-1" v-if="action.name == 'edit'"/>
                        <XIcon class="w-4 h-4 mr-1" v-if="action.name == 'deactivate'"/>
                        <Trash2Icon class="w-4 h-4 mr-1" v-if="action.name == 'delete'"/>
                        <span class="capitalize font-bold"> {{action.label ? action.label : action.name}} </span>
                      </inertia-link>

                      <a v-else class="flex rounded items-center mr-3 p-1 btn-sm btn-primary text-white" href="javascript:;" @click.prevent="triggerEmit(action, item)">
                        <EditIcon class="w-4 h-4 mr-1" v-if="action.name == 'edit'"/>
                        <XIcon class="w-4 h-4 mr-1" v-if="action.name == 'deactivate'"/>
                        <Trash2Icon class="w-4 h-4 mr-1" v-if="action.name == 'delete'"/>
                        <span class="capitalize font-bold"> {{action.label ? action.label : action.name}} </span>
                      </a>
                    </div>

                  </div>

                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- BEGIN: Pagination -->
      <pagination :data="paginationData" v-if="paginated" v-on:navigate="navigateTo" v-on:trigger-update="triggerUpdate"/>
      <!-- END: Pagination -->
    </div>
</template>

<script>
import LoadingIcon from './LoadingIcon.vue'
import Pagination from './Pagination.vue'

// import router from '../../router'
export default {
  components:{
    Pagination,
    LoadingIcon
  },
  props:{
    dataObject: {
      type: Object,
      default: () => {
        return {}
      }
    },
    title:{
      type:String,
      default: ""
    },
    exportendpoint:{
      type:String,
      default: null
    },
    columns:{
      type:Array,
      default: ()=>{
          return []
      }
    },
    actions:{
      type:Array,
      default: ()=>{
          return []
      }
    },
    paginated:{
      type:Boolean,
      default: true
    },
    loading:{
      type:Boolean,
      default: false
    },    
    searchable:{
      type:Boolean,
      default: true
    },
    parameters:{
      type:Object,
      default: () => {
        return {}
      }
    },
  },
  computed:{

    paginationData(){
      return {
        links:  this.searchResponse.data ? this.searchResponse.links : this.dataObject.links,
        from:  this.searchResponse.from ? this.searchResponse.from : this.dataObject.from,
        to:  this.searchResponse.to ? this.searchResponse.to : this.dataObject.to,
        current_page:  this.searchResponse.current_page ? this.searchResponse.current_page :this.dataObject.current_page,
        total:  this.searchResponse.total ? this.searchResponse.total : this.dataObject.total,
        last_page:  this.searchResponse.last_page ? this.searchResponse.last_page : this.dataObject.last_page,
        per_page:  this.searchResponse.per_page ? this.searchResponse.per_page : this.dataObject.per_page
      }
    },
    keysData(){
      let keyObject = [];
      this.columns.forEach(element => {
        if(element.type !== 'timestamp')
          keyObject.push(element.table_name ? element.table_name : element.name);
      });

      return keyObject;
    },
    filteredData() {
      return this.searchResponse.data ? this.searchResponse.data : this.dataObject.data;
      if (this.search) {
          items = items.filter((row) => {
              return Object.keys(row).some((key) => {
                  return String(row[key]).toLowerCase().indexOf(this.search.toLowerCase()) > -1;
              })
          });
      }

      console.log("types","item", typeof(items),"columns", typeof(this.columns));
      console.log("items", items, "columns", this.columns);
      //return [];

      let sortKey = this.sortKey ? this.sortKey : this.columns[0].name;
      let order = this.sortOrders[sortKey] || 1;
      if (sortKey && items) {
        console.log('key', sortKey);
          items = items.slice().sort((a, b) => {
              let index = this.getIndex(this.columns, 'name', sortKey);
              a = String(a[sortKey]).toLowerCase();
              b = String(b[sortKey]).toLowerCase();
              if (this.columns[index].type && this.columns[index].type === 'date') {
                  return (a === b ? 0 : new Date(a).getTime() > new Date(b).getTime() ? 1 : -1) * order;
              } else if (this.columns[index].type && this.columns[index].type === 'number') {
                  return (+a === +b ? 0 : +a > +b ? 1 : -1) * order;
              } else {
                  return (a === b ? 0 : a > b ? 1 : -1) * order;
              }
          });
      }

      return items;
    },
  },
  data(){
    return {
      sortOrders: {},
      searchResponse: {},
      sortKey: null,
      sortedData: {},
      length: 10,
      search: '',
      typingInterval: null,
      url: ''
    }
  },
  methods:{
    columnClasses(column, color_name = ''){
      console.log(column, color_name)
      let classes = '';
      if(column.link){
        classes += 'btn-sm btn-primary text-white uppercase border rounded p-1 border-blue-400';
      }
      if(column.color_coding){
        classes += this.$page.props[column.color_coding][color_name.toLowerCase()];
      }
      return classes;
    },
    getDisplayValue(column, item){
        var nameArr = column.name.split(".");
        if(column.type){
            if(column.type === 'date'){
              return (nameArr.length > 1 && nameArr.length === 2) ? this.getDate(item[nameArr[0]][nameArr[1]]):this.getDate(item[column.name])
            }else if(column.type === 'timestamp'){
              return (nameArr.length > 1 && nameArr.length === 2) ? this.TwelveHourTimestamp(item[nameArr[0]][nameArr[1]]): this.TwelveHourTimestamp(item[column.name])

            }else if(column.type === 'currency'){
              return (nameArr.length > 1 && nameArr.length === 2 && item[nameArr[0]]) ? this.formatMoney(item[nameArr[0]][nameArr[1]]): this.formatMoney(item[column.name])
            }else if(column.type === 'boolean'){
              return (item[column.name]) ? "Active": "Inactive"
            }
        }else{
          return (nameArr.length > 1 && nameArr.length === 2 && item[nameArr[0]]) ? item[nameArr[0]][nameArr[1]]:item[column.name]

        }

    },
    setTimer(){
      clearInterval(this.typingInterval);
      let interval = setInterval(() => {
      let data = {...{keys: this.keysData}, ...{filter_value: this.search}, ...this.parameters};
        //this.filterData(data);
        clearInterval(this.typingInterval);
      }, 600);
      this.typingInterval = interval;
    },
    clearTimer(){
      console.log("Unset", this.typingInterval)
      clearInterval(this.typingInterval);
            console.log("Has it", this.typingInterval)
    },
    navigateTo(data){
      this.$emit('navigate', data);
    },
    triggerUpdate(data){
      this.$emit('triggerUpdate', data);
    },
    editItem(data){
      this.$emit('edit', data);
    },
    triggerEmit(action, data){
      this.$emit(action.name, data);
    },
    filterData(search){
      if(!search || !search.query_term || search.query_term === ''){
        this.searchResponse = {};
      }

      let keys = [];
      callApiHeaders('GET', this.dataObject.path, search, null).then(
        (response) => {
          console.log("search",response);

          if(response){
            this.searchResponse = response.data;
          }else{
            this.searchResponse = {};
          }
        }
      )
      // search['keys'] = keys;

      // this.$emit('filter', search);
    },
    // openCompany(data){
    //   console.log(data);
    //   router.push({ path: data.url, params: data.item })
    // }
  }
}
</script>

<style>

</style>
