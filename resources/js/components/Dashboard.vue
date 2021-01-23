<template>
<div class="w-full flex min-h-screen relative justify-center items-center">
    <div id="loader-wrapper" class="w-full flex justify-center items-center" v-if="loading">
        <div id="loader" class="block border-t-3 -ml-20 -m-20 relative w-40 h-40 z-20 rounded-full"></div>
    </div>
    <div class="w-full flex flex-wrap relative justify-center" v-else>
        <div class="w-full md:w-1/2 flex px-3" id="tickets-card">
            <div class="w-full" v-if="hasTickets">
                <ul class="list-none">
                    <li class="" transition="expand" v-bind:key="index" v-for="(ticket, index) in tickets">
                        <div class="item-holder details-box">
                            <div class="item-details">
                                <div class="flex flex-wrap justify-between">
                                    <h5 class="self-start text-blue-300">{{ticket.name}}</h5>

                                    <!--<span id="show-modal" @click="showModal(ticket)"><i class="fas fa-paper-plane"></i></span>-->
                                    <div class="flex">
                                        <a class="self-end mx-3 text-blue-700" v-bind:href="'mailto:'+ticket.email" title="Reply"><i class="fas fa-paper-plane"></i></a>
                                        <a class="self-end mx-3 text-blue-700" href="" title="Mark as Seen" @click.prevent="markRead(index)"><i class="fas fa-eye"></i></a>
                                    </div>
 
                                </div>
                               <p class="py-2"> Email: {{ticket.email}}</p>
                                <div>{{ticket.message}}</div>
                            </div>
                            <hr> 
                        </div>
                    </li>
                </ul>

            </div>

            <div class="w-full flex flex-wrap flex-col items-center justify-center" v-else>
                <img src="/images/norecords.png">
                <p>Hoorayy. No Tickets Here!! </p>

            </div>
        </div>
        <div class="w-full md:w-1/2"> 
            <chart v-if="chartLoaded" v-bind:chartdata="chartData"></chart>
        </div>       
    </div>
   
</div>
</template>

<script>
    const STATUS_INITIAL = 0, STATUS_SAVING = 1, STATUS_SUCCESS = 2, STATUS_FAILED = 3, SHOW_MODAL = 4;
    import Chart from './Chart';
    export default {
        components: {
            Chart
        },
        mounted() {
            console.log('Component mounted.');
            this.getTicketItems();
            this.getStats();
        },
        computed: {
            chartLoaded(){
                return this.chartData !== null;
            },
            hasTickets(){
                return this.tickets.length > 0;
            },
            isInitial() {
                return this.currentStatus === STATUS_INITIAL;
            },
            isSaving() {
                return this.currentStatus === STATUS_SAVING;
            },
            isSuccess() {
                return this.currentStatus === STATUS_SUCCESS;
            },
            isFailed() {
                return this.currentStatus === STATUS_FAILED;
            },
            loading() {
                return this.ticketsLoading && this.gettingStats;
            }
        },
        data(){
            return {
                tickets: [],
                currentStatus: STATUS_INITIAL,
                modalVisible: false,
                reply: '',
                ticketsLoading: true,
                gettingStats: true,
                replyError: false,
                selectedTicket: null,
                chartData: null,
                chartOptions: null,
            }
        },
        methods: {
            async getTicketItems() {
                var _this = this;
                console.log("Getting items");

                axios.get('/gettickets').then(function (response) {
                    console.log("Tickets", response.data.data);
                    _this.tickets = response.data.data;
                    _this.ticketsLoading = false;
                });

            },
            async getStats() {
                var _this = this;
                console.log("Getting items");

                axios.get('/getstats').then(function (response) {
                    console.log("Tickets", response.data);
                    let data = {
                        labels: response.data.labels,
                        datasets: [{
                                label: 'Site Visits',
                                fill: false,
                                borderColor: 'rgb(255, 99, 132)',
                                data: response.data.dataset.site
                            },
                            {
                                label: 'Article Visits',
                                fill: false,
                                borderColor: 'rgb(69, 106, 200)',
                                data: response.data.dataset.article
                            },
                        ]
                    }
                    _this.chartData = data;
                    _this.gettingStats = false;
                });

            },
            showModal(ticket){
                this.modalVisible = true;
                this.selectedTicket = ticket;
                this.$bvModal.show('modal-prevent-closing');
            },
            checkFormValidity() {
                const valid = this.$refs.form.checkValidity()
                this.replyState = valid
                return valid
            },
            resetModal() {
                this.modalVisible = true,
                this.reply = ''
                this.replyState = null
            },
            hideModal() {
                this.modalVisible = false,
                this.reply = ''
                this.replyState = null
            },
            handleOk(bvModalEvt) {
                // Prevent modal from closing
                bvModalEvt.preventDefault()
                // Trigger submit handler
                this.handleSubmit()
            },
            handleSubmit() {
                // Exit when the form isn't valid
                if (!this.checkFormValidity()) {
                    return
                }
                // Push the name to submitted names
                this.submittedNames.push(this.name)
                // Hide the modal manually
                this.$nextTick(() => {
                this.$bvModal.hide('modal-prevent-closing')
                })
            },
            markRead(index) {
                let ticket = this.tickets[index];
                console.log("Mark read", index, ticket);

                var _this = this;
                console.log("Getting items");

                axios.get('/ticketread/' + ticket.id).then(function (response) {
                    console.log("Tickets", response.data);
                    _this.tickets.splice(index, 1);
                }).catch(err => {
                    console.log(err);
                });

            },
            
        }
    }
</script>
