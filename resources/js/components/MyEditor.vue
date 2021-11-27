<template>
    <div class="w-full md:max-w-7xl mx-auto sm:px-6 lg:px-8"  id="inlineEditor">
        <div class="m-4 py-4 file-upload">
            <label class="block font-bold text-lg my-2"> {{this.type}} Header </label>
            <div ref="uploadWrap" class="image-upload-wrap h-72 flex justify-center item-center mt-4 border-4 border-dashed border-green-400 hover:bg-green-400 hover:border-white relative" v-show="!itsAnEdit">
                <input class="file-upload-input h-full absolute opacity-0 cursor-pointer" type="file" name="files" v-on:change="readURL($event.target)" accept="image/*" />
                <div class="drag-text px-6">
                    <h5> Drag and drop a file or select add image </h5>
                </div>
            </div>
            
            <div ref="uploadContent" class="file-upload-content text-center hidden m-auto" v-if="!itsAnEdit">
                <img class="h-max-80 m-auto mb-4 file-upload-image" ref="uploadImage" src="#" alt="header image" />
                <div class="image-title-wrap">
                    <button type="button" class="file-upload-btn"  onclick="document.getElementsByClassName('file-upload-input')[0].click" > Change Header image </button>
                </div>
            </div>
            <div v-else>
                <div class="img-edit-container">
                    <img class="h-max-80 m-auto mb-4 file-upload-image" src="#" alt="header image" v-if="headerChanged" />
                    <div class="file-upload-edit" v-bind:style="{ backgroundImage: 'url(' + headerUrl + ')' }" v-else></div>
                    <div class="image-edit-wrap">
                        <button type="button" class="file-upload-btn more-btn"  onclick="document.getElementsByClassName('file-upload-input')[0].click" > Change Header image </button>
                    </div>
                </div> 
            </div>
            <span v-if="headerError"> <small>Header is required!</small> </span>
        </div>
       
        <div class="inline-editor w-full">
            <label class="block font-bold text-lg my-2" v-if="editorTitle !== ''"> {{this.type}} Title </label>
            <!-- <div class="ck-content">
                <ckeditor 
                :editor="editor"
                :config="titleConfig"
                v-model="editorTitle"
                >
                </ckeditor>
            </div> -->
            <input class="form-control w-full rounded rounded border-transparent bg-transparent" id="header-create" v-model="editorTitle" type="text" :placeholder="'Enter' +this.type+' Title'" />

            <span v-if="titleError && editorTitle === ''"> <small>{{this.type}} Title cannot be empty!</small> </span>
        </div>
        <div class="inline-editor w-full rounded">
            <label class="block font-bold text-lg my-2" v-if="editorData !== ''"> {{this.type}} Body </label>
            <div class="myck-content">
                <ckeditor 
                :editor="editor"
                :config="postConfig"
                v-model="editorData">
                </ckeditor>
            </div>
            <span v-if="bodyError  && editorData === ''"> <small>{{this.type}} Body cannot be empty!</small> </span>
        </div>
        <div class="inline-editor w-full rounded">
            <label class="block font-bold text-lg my-2" v-if="excerptData !== ''"> {{this.type}} Excerpt </label>
            <div class="myck-content">
                <textarea class="w-full rounded rounded border-transparent bg-transparent"
                placeholder="Type article excerpt here(displayed on blog home and shared links)"
                :config="postConfig"
                v-model="excerptData">
                </textarea>
            </div>
            <span v-if="bodyError  && excerptData === ''"> <small>{{this.type}} Excerpt cannot be empty!</small> </span>
        </div>
        <div >
            <label class="block font-bold text-lg my-2" for="blog category" v-if="category_id"> Blog Category </label>
            <select  class="block appearance-none w-full border-0 bg-transparent px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline" required v-model="category_id" id="blog-category">
                <option value="">Select Blog Category</option>
                <option :value="item.id" :key="index" v-for="(item, index) in categories">{{item.name}}</option>
            </select>
            <span v-if="bodyError  && excerptData === ''"> <small>{{this.type}} Category cannot be empty!</small> </span>
        </div>

        <div class="inline-editor">
            <label class="block font-bold text-lg my-2" v-if="editorTags !== ''"> {{this.type}} Tags </label>
            <br>
            <span :key="index" v-for="(tag,index) in tags" class="p-2 px-3 rounded-lg bg-blue-200">{{tag.name}}</span>
            <input class="form-control w-full rounded rounded border-transparent bg-transparent" v-model="editorTags" type="text" :placeholder="this.type + ' Tags(Separated by comma)'" />
        </div>
        

        <div v-if="isSaving">
            <h2>Saving....</h2>
        </div>
        <div class="clearfix">
            <div class="float-right" id="publish-btn" v-if="itsAnEdit">
                <button type="button" class="border border-blue-600 text-blue-600 px-4 py-3 rounded my-3 hover:bg-blue-600 hover:text-white" @click="updatePost(false)">Update as draft</button>
                <button type="button" class="border border-green-600 text-green-600 px-4 py-3 rounded my-3 hover:bg-green-600 hover:text-white" @click="updatePost(true)">Update & Publish</button>
            </div>

            <div class="float-right" id="publish-btn" v-else>
                <button type="button" class="border border-blue-600 text-blue-600 px-4 py-3 rounded my-3 hover:bg-blue-600 hover:text-white" @click="savePost(false)">Save as draft</button>
                <button type="button" class="border border-green-600 text-green-600 px-4 py-3 rounded my-3 hover:bg-green-600 hover:text-white" @click="savePost(true)">Publish</button>
            </div>
        </div>
        
    </div>
</template>

<script>
    import CKEditor from '@ckeditor/ckeditor5-vue';
    import InlineEditor from '@ckeditor/ckeditor5-build-inline';
    // import InlineEditor from '@ckeditor/ckeditor5-editor-inline/src/inlineeditor';
    // import CKFinder from '@ckeditor/ckeditor5-ckfinder/src/ckfinder';
    // import EssentialsPlugin from '@ckeditor/ckeditor5-essentials/src/essentials';
    // import ListPlugin from '@ckeditor/ckeditor5-list/src/list';
    // import ParagraphPlugin from '@ckeditor/ckeditor5-paragraph/src/paragraph';
    // import AutoformatPlugin from '@ckeditor/ckeditor5-autoformat/src/autoformat';
    // import BoldPlugin from '@ckeditor/ckeditor5-basic-styles/src/bold';
    // import ItalicPlugin from '@ckeditor/ckeditor5-basic-styles/src/italic';
    // import BlockQuotePlugin from '@ckeditor/ckeditor5-block-quote/src/blockquote';
    // import HeadingPlugin from '@ckeditor/ckeditor5-heading/src/heading';
    // import UndoPlugin from '@ckeditor/ckeditor5-undo/src/undo';
    // import ToolbarView from '@ckeditor/ckeditor5-ui/src/toolbar/toolbarview';
    const STATUS_INITIAL = 0, STATUS_SAVING = 1, STATUS_SUCCESS = 2, STATUS_FAILED = 3;
    export default {
        name: 'inlineEditor',
        components: {
            // Use the <ckeditor> component in this view.
            ckeditor: CKEditor.component
            
        },
        props: {
            isEdit:{
                type: Boolean,
                default: false,
            },
            uid:{
                type: Number,
                default: null,
            },
            categories:{
                type: Array,
                default: function(){
                    return new Array
                },
            }
        },
        mounted() {
            // document.getElementsByClassName('image-upload-wrap')[0].bind('dragover', function () {
            //     document.getElementsByClassName('image-upload-wrap')[0].classList.add('image-dropping');
            // });
            // document.getElementsByClassName('image-upload-wrap')[0].bind('dragleave', function () {
            //     document.getElementsByClassName('image-upload-wrap')[0].classList.remove('image-dropping');
            // });
            //this.getCategories();
            if(this.itsAnEdit){
                this.populateDetails();
            }
            
            console.log("TYPE!!", this.uid);
        },
         data() {
            return {
                editor: InlineEditor,
                headerImage: null,
                currentStatus: null,
                articleCategory: 'null',
                uploadError: false,
                headerError: false,
                titleError: false,
                bodyError: false,
                categoryError: false,
                headerChanged: false,
                tags: [],
                errors: [],
                type: 'Article',
                headerUrl: '',
                editorData: '',
                excerptData: '',
                editorTitle: '',
                editorTags: '',
                categoryName: '',
                category_id: '',
                postUrl: '/author/save-post',
                analysisUrl: '/author/save-analysis',
                articleUrl: '/author/save-article',
                postUpdateUrl: '/author/edit-post/',
                analysisUpdateUrl: '/author/edit-analysis/',
                articleUpdateUrl: '/author/edit-article/',
                titleConfig: {
                    placeholder: "Article Title"
                },
                postConfig: {
                    placeholder: "Type Article Body",
                    uploadUrl: 'https://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json'
                },
                toggleDraft: false,
                togglePublish: false
            };
        },
        computed: {
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
            newCategory() {
                return this.articleCategory ==='new';
            },
            itsAnEdit() {
                if(this.uid == undefined){
                    return false;
                }
                return true;
            }
        },
        methods: {
            readURL(input) {
                
                if (input.files && input.files[0]) {

                    var reader = new FileReader();
                    
                    var _this = this;

                    reader.onload = function(e) {
                        
                        _this.$refs.uploadWrap.style.display = 'none';

                        _this.$refs.uploadImage.setAttribute('src', e.target.result);
                        _this.$refs.uploadContent.style.display = 'block';

                    };

                    reader.readAsDataURL(input.files[0]);
                    this.headerImage = input.files[0];
                    this.headerError = false;

                    if(this.itsAnEdit){
                        this.headerChanged = true;
                    }
                } else {
                    removeUpload();
                }
            },
            removeUpload() {
                document.getElementsByClassName('file-upload-input').replaceWith(document.getElementsByClassName('file-upload-input').clone());
                document.getElementsByClassName('file-upload-content')[0].style.display = 'none';
                document.getElementsByClassName('image-upload-wrap')[0].style.display = 'block';
            },
            finish(){
                console.log("Reset run");
                // reset form to initial state
                this.currentStatus = STATUS_INITIAL;
                this.uploadError = null;

                window.location.href = '/manage';
               
                //this.$router.push('/');
            },
            savePost(published){
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
                if (this.headerImage !== null){
                    formData.append('header', this.headerImage);
                }
                if (published){
                    formData.append('published', true);
                }
                formData.append('title', this.editorTitle);
                formData.append('body', this.editorData);
                formData.append('excerpt', this.excerptData);
                formData.append('category_id', this.category_id);
                formData.append('categories', this.editorTags);

                console.log(formData);
                /*
                    *
                    Make the request to the POST /multiple-files URL
                */

                let url = this.articleUrl;
                if(this.type === 'Post'){
                    url = this.postUrl;
                }else if (this.type === 'Analysis'){
                    url = this.analysisUrl;
                }

                axios.post( url,
                    formData,
                    {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                    }
                ).then(data => {
                    console.log('SUCCESS!!', data);
                    this.currentStatus = STATUS_SUCCESS;
                    //optionally refetch records here
                    this.finish();
                })
                .catch(err => {
                    console.log('FAILURE!!', err);
                    this.currentStatus = STATUS_FAILED;
                    this.errors = err.response.data.errors;
                });

            },
            updatePost(published){
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
                if (this.headerImage !== null){
                    formData.append('header', this.headerImage);
                }
                if (published){
                    formData.append('published', true);
                }
                formData.append('title', this.editorTitle);
                formData.append('body', this.editorData);
                formData.append('excerpt', this.excerptData);
                formData.append('category_id', this.category_id);
                formData.append('categories', this.editorTags);

                console.log(formData);
                /*
                    *
                    Make the request to the POST /multiple-files URL
                */

                let url = this.articleUpdateUrl + this.uid;
                if(this.type === 'Post'){
                    url = this.postUpdateUrl + this.uid;
                }else if (this.type === 'Analysis'){
                    url = this.analysisUpdateUrl + this.uid;
                }

                axios.post( url,
                    formData,
                    {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                    }
                ).then(data => {
                    console.log('SUCCESS!!', data);
                    this.currentStatus = STATUS_SUCCESS;
                    //optionally refetch records here
                    this.finish();
                })
                .catch(err => {
                    console.log('FAILURE!!', err);
                    this.currentStatus = STATUS_FAILED;
                    this.errors = err.response.data.errors;
                });

            },
            isValid () {
                this.errors = [];
                this.resetErrors();
                // if(this.headerImage === null){
                //     this.headerError = true;
                //     this.errors.push("Header Image is required.");
                // }

                if(this.editorTitle === ''){
                    this.titleError = true;
                    this.errors.push(this.type + " Title cannot be empty.");
                }

                if(this.editorData === ''){
                    this.bodyError = true;
                    this.errors.push(this.type + " Body Cannot be empty.");
                }

                if(this.editorTitle !== '' && this.editorData !== ''){
                    return true;
                }

                return false;
            },
            errorTooltip () {
                // Note this is called each time the tooltip is first opened.
                var length = this.errors.length;
                var i = 0;
                
                let tip = '<div>'+
                    '<h6>Upload failed.</h6>'+
                    '<hr class="tooltipHr"></hr>';
                    
                for(var key in this.errors){
                    tip = tip + '<span class="fullwidth"><strong>' + this.errors[key] + '</strong></span>'
                }

                tip = tip+'</div>';
                return tip;
            
            },
            resetErrors(){
                this.headerError = false;
                this.titleError = false;
                this.bodyError = false;
            },
            checkSelection(){
                console.log("check selection", this.articleCategory)
                if(this.newCategory){
                    this.$bvModal.show('modal-new-category');
                }
            },
            checkFormValidity() {
                const valid = this.$refs.form.checkValidity()
                this.replyState = valid
                return valid
            },
            resetModal() {
                this.reply = ''
                this.replyState = null
            },
            handleOk(bvModalEvt) {
                // Prevent modal from closing
                bvModalEvt.preventDefault()
                // Trigger submit handler
                this.submitCategory()
            },
            submitCategory() {
                // Exit when the form isn't valid
                if (!this.checkFormValidity()) {
                    return
                }
                // Push the name to submitted names
                console.log("Name", this.categoryName);
                this.saveCategory();
                // Hide the modal manually
                this.$nextTick(() => {
                this.$bvModal.hide('modal-new-category')
                })
            },
            async getCategories() {
                var _this = this;
                console.log("Getting items");

                axios.get('/api/getcategories').then(function (response) {
                    console.log("Categories", response.data.data);
                    _this.categories = response.data.data;
                });

            },
            async populateDetails() {
                var _this = this;
                let route = "/admin/article/" + this.uid;
                console.log("Getting details");
                if(this.type === 'Post'){
                    route = "/admin/post/"+ this.uid;
                }else if (this.type === 'Analysis'){
                    route = "/admin/analysis/" + this.uid;
                }

                axios.get(route).then(function (response) {
                    console.log("Response data", response.data.data);
                    _this.editorTitle = response.data.data.title;
                    _this.editorData = response.data.data.body;
                    _this.excerptData = response.data.data.excerpt;
                    _this.category_id = response.data.data.category_id;
                    _this.headerUrl = response.data.data.header;
                    _this.tags = response.data.data.categories;
                });

            },
            capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        }
    }
</script>