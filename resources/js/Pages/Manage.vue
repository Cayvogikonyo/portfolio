<template>
    <app-layout>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 flex flex-col text-gray-900 dark:text-white">
            <button type="button" class="border border-green-600 text-green-600 px-4 py-3 rounded my-3 self-end"  @click="newArticle()"> <i class="fas fa-plus"></i> New Article</button>

            <div class="flex justify-center">
                <div class="flex flex-wrap w-9/12 mx-auto"  v-if="noArticles">
                    <div class="outer">
                        <div class="inner" v-if="loadingArticles">
                            <p>Loading articles...</p>
                        </div>
                        <div class="inner" v-else>
                            <p>No articles...</p>
                        </div>
                    </div>
                </div>
                <div class="w-full" id="posts-container" v-else>
                    <ul v-if="articles.length > 0" class="item-list md:grid md:grid-cols-3 md:gap-3" id="items-card">
                        <li class="w-full my-3 relative" transition="expand" v-for="(post, index) in articles" :key="index">
                            <div class="h-49 bg-gray-900 dark:bg-white bg-opacity-50">
                                <div class="h-full w-full"  v-bind:style="{ backgroundImage: 'url(storage/' + post.header + ')' }">
                                </div>
                            </div>
                            <div class="w-full shadow rounded flex z-40" >
                                <div class="article-overlay px-3 p-2 w-full self-end">
                                    <h4 class="article-card-header cursor-pointer font-bold text-gray-100" v-html="post.title"> </h4>
                                    <div class="flex w-full justify-between">
                                        <button type="button" class="border border-green-600 bg:bg-green-600 text-green-600 hover:text-white px-4 py-2 rounded my-3 editsBtn" id="more-btn" v-show="!post.published" @click="publish(post.id, post.title, index)">
                                            Publish
                                        </button>
                                        <button type="button" class="border border-blue-600 hover:bg-blue-600 text-blue-600 hover:text-white px-4 py-2 rounded my-3 editsBtn" id="more-btn" @click="edit(post.id, post.uid, index)">
                                            Edit
                                        </button>
                                        <button type="button" class="border border-red-600 hover:bg-red-600 text-red-600 hover:text-white px-4 py-2 rounded my-3 editsBtn" id="more-btn" @click="deleteItem(post.id, post.title, index)">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
        props:{
            articles: {
                type: Array,
                default: new Array(),
            }
        },
        mounted() {
            console.log('Component mounted.');
            //this.getArticleItems();
        },
        computed:{
            noArticles(){
                return this.articles.length === 0
            }
        },
        data() {
            return {
                selected: 'articles',
                loadingArticles: false,
            }
        },
        methods: {
            async showArticles(){
                this.selected = 'articles';
                this.getArticleItems();
            },
            async deleteItem(uid, title, index){
                let route = '';
                let text = '';
                if(this.selected == 'articles'){
                    route = 'delete-article/' + uid;
                    text = 'Article deleted!';
                }else if(this.selected == 'analysis'){
                    route = 'delete-analysis/' + uid;
                    text = 'Analysis deleted!';
                }else{
                    route = 'delete-post/' + uid;
                    text = 'Blog Post deleted!';
                }
                console.log(route);

                this.$confirm("Are you sure you want to delete "+ title +"?", "", "warning").then(() => {
                    console.log("Deleting");
                    //delete post...
                    axios.post( route )
                    .then(response => {
                        console.log('SUCCESS!!', response);
                        let mylist = [];
                        if(response.data.message == 'success'){
                            if(this.selected == 'articles'){
                                this.articles.splice(index, 1);
                            }else if(this.selected == 'analysis'){
                                this.analysis.splice(index, 1);
                            }else{
                                this.blogs.splice(index, 1);
                            }
                            this.$fire({
                                title: "Success",
                                text: text,
                                type: "success",
                                timer: 3000
                            }).then(r => {
                                console.log(r.value);
                            });
                        }
                    })
                    .catch(err => {
                        console.log('FAILURE!!', err);
                    });
                }).catch(err => {console.log(err)});
                                
            },
            async newArticle(){
                let route = '';
                route = '/new/article';
               
                console.log(route);
                window.location.href = route;
                //this.$router.push(route);
            },
            async edit(uid, index){
                let route = '';
                route = '/edit/article/' + uid;
               
                console.log(route);
                window.location.href = route;
                //this.$router.push(route);
            },
            async publish(uid, title, index){
                let route = '';
                let text = '';
                route = 'publish-article/' + uid;
                text = 'Article published!';
               
                console.log(route);
                this.$confirm("Publish "+ title +"?", "", "info").then(() => {
                    console.log("Publishing");
                    //delete post...
                    axios.post( route )
                    .then(response => {
                        console.log('SUCCESS!!', response);
                        if(this.selected == 'articles'){
                            this.articles[index].published = true;
                        }else if(this.selected == 'analysis'){
                            this.analysis[index].published = true;
                        }else{
                            this.blogs[index].published = true;
                        }
                        if(response.data.message == 'success'){
                            this.$fire({
                                title: "Success",
                                text: text,
                                type: "success",
                                timer: 3000
                            }).then(r => {
                                console.log(r.value);
                            });
                        }
                    })
                    .catch(err => {
                        console.log('FAILURE!!', err);
                    });
                }).catch(err => {console.log(err)});
            },
            async getArticleItems() {
                var _this = this;
                console.log("Getting items");
                this.loadingArticles = true;
                axios.get('/getarticles').then(function (response) {
                    console.log("Posts", response.data.data);
                    _this.articles = response.data.data;
                    _this.loadingArticles = false;

                });
            },
            capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        }
    }
</script>
