<template>
   <div class="contact-us full-view slowfadein">
        <h3 class="section-header center">CONTACT US</h3>

        <div class="row contactRow">
            <div class="col-md-6 contact-group">
                <div class="outer">
                    <div class="inner">
                        <p>We would be glad to hear from you. Leave us a message in the form. </p>
                        <p>You can also reach us through our
                        Email: <a href="mail:info@thebrainerke.co.ke"> info@pikdrive.com </a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 contact-form">
                <div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" placeholder="What may we call you" v-model="name" id="name">
                        <span class="error" v-if="nameError"> <small>Name cannot be empty!</small> </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" v-model="email" id="email" placeholder="name@example.com">
                        <span class="error" v-if="emailError"> <small>Email cannot be empty!</small> </span>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" v-model="message" placeholder="Leave us a message" rows="3"></textarea>
                        <span class="error" v-if="messageError"> <small>Message body cannot be empty!</small> </span>
                    </div>
                </div>
                <div class="form-success">
                    <span v-if="isSaving"> <small>Please wait...</small> </span>
                </div>
                <div class="float-right" id="publish-btn">
                    <button type="button" class="btn btn-outline-danger" v-if="hasChanges"  @click="resetContactUs()">Cancel</button>
                    <button type="button" class="btn btn-outline-success"  @click="saveTicket()">Send</button>
                </div>
                <div class="form-success">
                    <span v-if="isSuccess"> <small>Thank you. We will get back to you shortly.</small> </span>
                </div>
            </div>
        </div>
    </div>
   
</template>

<script>
    const STATUS_INITIAL = 0, STATUS_SAVING = 1, STATUS_SUCCESS = 2, STATUS_FAILED = 3;
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                name: '',
                email: '',
                message: '',
                nameError: false,
                emailError: false,
                messageError: false,
                currentStatus: STATUS_INITIAL
            };
        },
        computed: {
            hasChanges() {
                if(this.name !== '' || this.email !== '' || this.message !== ''){
                    return true;
                }
            },
            isSaving() {
                return this.currentStatus === STATUS_SAVING;
            },
            isSuccess() {
                return this.currentStatus === STATUS_SUCCESS;
            },
        },
        methods: {
            saveTicket(){
                /*
                    Initialize the form data
                */
                let formData = new FormData();

                /*
                    Iteate over any file sent over appending the files
                    to the form data.
                */
                if(!this.isValid()) {
                    this.currentStatus = STATUS_FAILED;
                    return;
                }

                this.currentStatus = STATUS_SAVING;

                //let file = this.fileList[key];
                formData.append('name', this.name);
                formData.append('email', this.email);
                formData.append('message', this.message);

                console.log(formData);
                /*
                    *
                    Make the request to the POST /multiple-files URL
                */

                axios.post( 'contact-us',
                    formData,
                    {
                        headers: {
                            'Accept': 'application/json'
                        }
                    }
                ).then(response => {
                    console.log('SUCCESS!!', response.data);
                    //optionally refetch records here
                    if(response.data.message == 'success'){
                        this.resetContactUs();
                        this.currentStatus = STATUS_INITIAL;
                        this.$fire({
                            title: "Success",
                            text: "Thank you. We will get back to you shortly.",
                            type: "success",
                            timer: 3000
                        }).then(r => {
                            console.log(r.value);
                        });
                    }
                })
                .catch(err => {
                    console.log('FAILURE!!', err);
                    this.currentStatus = STATUS_FAILED;
                });

            },
            isValid () {
                this.errors = [];
                this.resetErrors();
                if(this.name === ''){
                    this.nameError = true;
                }

                if(this.email === ''){
                    this.emailError = true;
                }

                if(this.message === ''){
                    this.messageError = true;
                }

                if(this.name !== '' && this.email !== '' && this.message !== ''){
                    return true;
                }

                return false;
            },
            finish(){
                console.log("Reset run");
                // reset form to initial state
                this.currentStatus = STATUS_INITIAL;
                this.errors = null;
                this.resetContactUs();

            },
            resetContactUs(){
                this.nameError = false;
                this.emailError = false;
                this.messageError = false;
                this.name = '';
                this.email = '';
                this.message = '';
            },
            resetErrors(){
                this.nameError = false;
                this.emailError = false;
                this.messageError = false;
            }
        }

    }
</script>
