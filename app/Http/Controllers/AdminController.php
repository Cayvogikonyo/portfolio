<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\General as GeneralResource;
use App\Http\Resources\AdminResource;
use App\Http\Resources\AdminCollection;
use App\Http\Resources\Ticket as TicketsResource;
use \App\Models\Portofolio;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function admin()
    {
        return Inertia::render('Dashboard', [

        ]);
    }

    /**
     * Get a validator for new categories request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function categoryValidator(array $data)
    {
        $v = Validator::make($data, [
            'category' => ['required', 'string', 'min:3'],
        ]);

        return $v;
    }
 

    /**
     * Get a validator for new post request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function postValidator(array $data)
    {
        $v = Validator::make($data, [
            'title' => ['required', 'string', 'min:3'],
            'body' => ['required', 'string', 'min:3'],
            'excerpt' => ['required', 'string', 'min:3'],
            'category_id' => ['nullable', 'integer', 'min:1'],
            'header' => ['nullable','file', 'mimes:jpg,jpeg,png,bmp','max:2048']
        ]);
        
     
        return $v;
    }


    /**
     * Save an article
     */
    public function saveArticle(Request $request)
    {
        $this->postValidator($request->all())->validate();        
        
        $data = $request->all();

        $path = null;
        if(null  !== $request->file('header')  && $request->file('header')->isValid() ){
            $path = $request->file('header')->store('eves/headers', 'statics');
        }
        $slug = Str::slug($request->title, '-');

        //Save the post here
        $post = new \App\Models\Article();
        $post->title = $request->title;
        $post->slug = $slug;

        if($path !== null){
            $post->header = Storage::url($path);
        }
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->user_id = $request->user()->id;
        if(null !== $request->published){
            $post->published = true;
        }
        if(null !== $request->category_id){
            $post->category_id = $request->category_id;
        }
        $post->views = 0;
        $post->save();


        if(!empty($request->categories)){
            $categoryString = preg_replace('/\s+/', '', $request->categories);
            $categories = explode(',',$categoryString);

            foreach ($categories as $value) {
                # code...Save categories here
                $category = \App\Models\Category::where('name', 'like', $value)->first();

                if(empty($category)){
                    $category = new \App\Models\Category;
                    $category->name = Str::lower($value);
                    $category->save();
                }
                
                $articleCategory = new \App\Models\ArticleCategory;
                $articleCategory->article_id = $post->id;
                $articleCategory->category_id = $category->id;
                $articleCategory->save();
            }
        }
        
        return $post;
    }


    /**
     * Edit an article
     */
    public function editArticle(Request $request, $id)
    {
        $this->postValidator($request->all())->validate();        
        $data = $request->all();

        $path = null;
        if(null  !== $request->file('header')  && $request->file('header')->isValid() ){
            $path = $request->file('header')->store('static_images/headers', 'statics');
        }
        $slug = Str::slug($request->title, '-');

        //edit the article here
        $post = \App\Models\Article::findorfail($id);
        $post->title = $request->title;
        $post->slug = $slug;
        if($path !== null){
            $post->header = Storage::url($path);
        }
        $post->body = $request->body;
        if(null !== $request->category_id){
            $post->category_id = $request->category_id;
        }
        $post->user_id = $request->user()->id;

        if(null !== $request->published){
            $post->published = true;
        }else{
            $post->published = false;
        }
        $post->update();


        if(!empty($request->categories)){
            $categoryString = preg_replace('/\s+/', '', $request->categories);
            $categories = explode(',',$categoryString);

            foreach ($categories as $value) {
                # code...Save categories here
                $category = \App\Models\Category::where('name', 'like', $value)->first();

                if(empty($category)){
                    $category = new \App\Models\Category;
                    $category->name = Str::lower($value);
                    $category->save();
                }
                
                $articleCategory = new \App\Models\ArticleCategory;
                $articleCategory->article_category_id = $post->id;
                $articleCategory->category_id = $category->id;
                $articleCategory->save();
            }
        }
        
        return $post;
    }

    

    /**
     * Fetch initial route articles
     */
    public function getArticles(Request $request)
    {
        $posts = \App\Models\Article::all();
        return AdminResource::collection($posts);
    }

    /**
     * Delete articles
     */
    public function deleteArticle(Request $request, $id)
    {
        $post = \App\Models\Article::findorfail($id);
        $post->delete();

        return array("message"=>"success");
    }

    /**
     * Delete articles
     */
    public function publishArticle(Request $request, $id)
    {
        $post = \App\Models\Article::findorfail($id);
        $post->published = true;
        $post->update();

        return array("message"=>"success");
    }

    /**
     * Fetch initial route articles
     */
    public function getArticle($id)
    {
        $post = \App\Models\Article::where('id', $id)->with('categories')->first();
        return new AdminResource($post);
    }

    /**
     * Fetch initial admin tickets
     */
    public function getTickets(Request $request)
    {
        $posts = \App\Models\Ticket::where('seen', false)->get();
        return TicketsResource::collection($posts);
    }

    /**
     * Fetch initial siteStats
     */
    public function getStats(Request $request)
    {
        $stats = \App\Models\SiteStat::orderBy('id', 'DESC')->limit(7)->get();
        $labels = [];
        $dataset = ['site' => array(), 'article' => array()];

        foreach ($stats as $value) {
            array_push($labels, $value->date);
            array_push($dataset['site'], $value->count);
            array_push($dataset['article'], $value->article_count);
        }

        sort($labels);
        sort($dataset['site']);
        sort($dataset['article']);
        return array('labels' => $labels, 'dataset' => $dataset);
    }

    /**
     * Manage Site content
     */
    public function manageSite(Request $request)
    {
        $config = \App\Models\SiteConfig::first();
        return Inertia::render('ManageSite', [
            'config' => $config
        ]);
    }

    /**
     * Manage Article content
     */
    public function manage(Request $request)
    {
        $posts =\App\Models\Article::all();    
        return Inertia::render('Manage', [
            "articles" => $posts
        ]);
    }

    /**
     * create new Article 
     */
    public function newArticle(Request $request)
    {
        $categories = \App\Models\BlogCategory::get();
       return Inertia::render('NewArticle',[
           "categories" => $categories
       ]);
    }


    /**
     * Edit Article 
     */
    public function articleEdit(Request $request, $id)
    {
        $categories = \App\Models\BlogCategory::get();
       return Inertia::render('EditArticle', [
           'isEdit' => true,
           'uid' => (int)$id,
           'categories' => $categories
       ]);
    }

    /**
     * Manage Blog Categories
     */
    public function manageCategories(Request $request)
    {
        $categories = \App\Models\BlogCategory::get();
        return Inertia::render('ManageCategories', [
            'categories' => $categories,
        ]);
    }


    /**
     * Save Blog Categories
     */
    public function saveCategories(Request $request)
    {

        $data = $request->validateWithBag('createCategory',[
            'name' => ['required', 'string', 'min:3'],
        ]);
        $category = new \App\Models\BlogCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->save();

        return redirect()->back()->with('success', 'Category Created');
    }



    /**
     *Mark ticket as read
     */
    public function ticketRead(Request $request, $id)
    {

        $ticket = \App\Models\Ticket::find($id);
        if(!empty($ticket)){
            $ticket->seen = true;
            $ticket->update();
        }
    }

    /************************************************
     *************Manage Portofolio details**********
     ***********************************************/


    /**
     * Manage Portofolio page
     */
    public function managePortofolio(Request $request, $id = null)
    {
        \App\Models\Portofolio::where('title', null)->where('name', null)->where('bio', null)->where('avatar', null)->delete();
        $portofolios =\App\Models\Portofolio::with(['experiences','skills','clients','services'])->get();    

        return Inertia::render('ManagePortofolio', [
            "portofolios" => $portofolios
        ]);
    }

    /**
     * Edit or Create Portofolio page
     */
    public function editPortofolio(Request $request, $id = null){

        if($id === null){
            $portofolio = new Portofolio;
            $portofolio->save();
        }else{
            $portofolio =\App\Models\Portofolio::with(['experiences','skills','clients','services'])->where('id', $id)->first();    
        }

        return Inertia::render('EditPortofolio', [
            "portofolio" => $portofolio
        ]);
    }

    /**
     * Manage Portofolio bio
     */
    public function portofolioBio(Request $request)
    {

        $data = $request->validateWithBag('updateBioInformation',[
            'portofolio_id' => ['required', 'numeric', 'min:0'],
            'title' => ['required', 'string', 'min:3'],
            'name' => ['required', 'string', 'min:3'],
            'bio' => ['required', 'string', 'min:3'],
            'photo' => ['nullable','file', 'mimes:jpg,jpeg,png,bmp','max:2048']
        ]);

        $path = null;
        if(null  !== $request->file('photo')  && $request->file('photo')->isValid() ){
            $path = $request->file('photo')->store('static_images', 'statics');
        }

        $portofolio =\App\Models\Portofolio::find($request->portofolio_id); 
        $portofolio->title = $request->title; 
        $portofolio->name = $request->name; 
        $portofolio->bio = $request->bio; 
        if($path !== null){
            $portofolio->avatar = Storage::url($path);
        }
        $portofolio->update();

        return redirect()->back()->with("success", "Client updated");
    }

    /**
     * Manage Portofolio client
     */
    public function portofolioClient(Request $request)
    {
        $data = $request->validateWithBag('updatePortofolioClient',[
            'portofolio_id' => ['required', 'numeric', 'min:0'],
            'title' => ['required', 'string', 'min:3'],
            'url' => ['nullable', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:3'],
            'icon' => ['nullable','file', 'mimes:jpg,jpeg,png,bmp','max:2048']
        ]);

        if(empty($request->id)){
            $client = new \App\Models\Client();
        }else{
            $client = \App\Models\Client::find($request->id);
        }
        $path = null;
        if(null  !== $request->file('icon')  && $request->file('icon')->isValid() ){
            $path = $request->file('icon')->store('static_images', 'statics');
        }

        $client->title = $request->title;
        $client->portofolio_id = $request->portofolio_id;
        $client->description = $request->title;

        if($path !== null){
            $client->icon = Storage::url($path);
        }
        if(empty($request->id)){
            $client->save();
        }else{
            $client->update();
        }
        return redirect()->back()->with("success", "Client updated");
    }

    /**
     * Manage Portofolio services
     */
    public function portofolioService(Request $request)
    {
        $data = $request->validateWithBag('updatePortofolioService',[
            'portofolio_id' => ['required', 'numeric', 'min:0'],
            'title' => ['required', 'string', 'min:3'],
            'icon' => ['required', 'string', 'min:0'],
            'description' => ['required', 'string', 'min:3'],
        ]);

        if(empty($request->id)){
            $service = new \App\Models\Service();
        }else{
            $service = \App\Models\Service::find($request->id);
        }

        $service->title = $request->title;
        $service->portofolio_id = $request->portofolio_id;
        $service->description = $request->description;
        $service->icon = $request->icon;

        if(empty($request->id)){
            $service->save();
        }else{
            $service->update();
        }
        return redirect()->back()->with("success", "Service updated");
    }

    /**
     * Manage Portofolio skill
     */
    public function portofolioSkill(Request $request)
    {
        $data = $request->validateWithBag('updatePortofolioSkill',[
            'title' => ['required', 'string', 'min:3'],
            'percentage' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string', 'min:3'],
        ]);

        if(empty($request->id)){
            $skill = new \App\Models\Skill();
        }else{
            $skill = \App\Models\Skill::find($request->id);
        }

        $skill->title = $request->title;
        $skill->portofolio_id = $request->portofolio_id;
        $skill->percentage = $request->percentage;
        $skill->description = $request->description;

        if(empty($request->id)){
            $skill->save();
        }else{
            $skill->update();
        }

        return redirect()->back()->with("success", "Skill updated");
    }

    /**
     * Manage Portofolio experience
     */
    public function portofolioExperience(Request $request)
    {
        $data = $request->validateWithBag('createStaff',[
            'portofolio_id' => ['required', 'numeric', 'min:0'],
            'title' => ['required', 'string', 'min:3'],
            'from' => ['required', 'string', 'min:3'],
            'to' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:3'],
        ]);


        if(empty($request->id)){
            $experience = new \App\Models\Experience();
        }else{
            $experience = \App\Models\Experience::find($request->id);
        }

        $experience->title = $request->title;
        $experience->portofolio_id = $request->portofolio_id;
        $experience->from = $request->from;
        $experience->to = $request->to;
        $experience->description = $request->description;

        if(empty($request->id)){
            $experience->save();
        }else{
            $experience->update();
        }

        return redirect()->back()->with("success", "Experience updated");
    }

    /**
     * Delete portofolio
     */
    public function deletePortofolio(Request $request){
        $portofolio = Portofolio::find($request->id);
        if(empty($portofolio)){
            abort(404);
        }
        $skills = $portofolio->skills;
        $experiences = $portofolio->experiences;
        $services = $portofolio->services;
        $clients = $portofolio->clients;

        if(!empty($skills)){
            foreach($skills as $skill){
                $skill->delete();
            }
        }

        if(!empty($experiences)){
            foreach($experiences as $experience){
                $experience->delete();
            }
        }

        if(!empty($services)){
            foreach($services as $service){
                $service->delete();
            }
        }

        if(!empty($clients)){
            foreach($clients as $client){
                $client->delete();
            }
        }

        $portofolio->delete();

        return redirect()->back()->with("success", "Portofolio deleted");

    }
   
    /**
     * Delete portofolio skill
     */
    public function deleteSkill(Request $request){
        $skill = App\Models\Skill::find($request->id);

        $skill->delete();

        return redirect()->back()->with("success", "Skill deleted");
    }
   
    /**
     * Delete portofolio experience
     */
    public function deleteExperience(Request $request){
        $experience = App\Models\Experience::find($request->id);

        $experience->delete();

        return redirect()->back()->with("success", "Experience deleted");
    }
   
    /**
     * Delete portofolio services
     */
    public function deleteService(Request $request){
        $service = App\Models\Service::find($request->id);

        $service->delete();

        return redirect()->back()->with("success", "Service deleted");
    }
   
    /**
     * Delete portofolio client
     */
    public function deleteClient(Request $request){
        $client = App\Models\Client::find($request->id);

        $client->delete();

        return redirect()->back()->with("success", "Client deleted");
    }

    /**********************************************************
     ***************Manage Work Details************************
     ********************************************************/

    /***
     * Manage Work Details
     */
    public function manageWork(Request $request){
        $works = \App\Models\Work::all();

        return Inertia::render('ManageWorks', [
            'works' => $works
        ]);
    } 

    /***
     * Create Work view
     */
    public function createWork(Request $request){
        $portofolios = \App\Models\Portofolio::with(['skills:id,portofolio_id,title', 'services:id,portofolio_id,title', 'clients:id,portofolio_id,title'])->get();
        $clients = \App\Models\Client::all();
        $services = \App\Models\Service::all();
        $skills = \App\Models\Skill::all();
        return Inertia::render('Work/NewWork', [
            'portofolios' => $portofolios,
            'skills' => $skills,
            'services' => $services,
            'clients' => $clients
        ]);
    } 

    /***
     * Store Work Details
     */
    public function storeWork(Request $request){
        $data = $request->validateWithBag('updateWorkInformation',[
            'title' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:3'],
            'url' => ['nullable', 'string', 'min:3'],
            'role' => ['nullable', 'string', 'min:3'],
            'excerpt' => ['nullable', 'string', 'min:3'],
            'skills' => ['nullable', 'array'],
            'collaborators' => ['nullable', 'array'],
            'collaborators*.avatar' => ['nullable', 'file'],
            'collaborators*.name' => ['required', 'string'],
            'client_id' => ['nullable', 'numeric'],
            'skills*.id' => ['required', 'numeric'],
            'icon' => ['nullable','file', 'mimes:jpg,jpeg,png,bmp','max:2048'],
            'header' => ['nullable','file', 'mimes:jpg,jpeg,png,bmp','max:2048']
        ]);

        if(empty($request->id)){
            $work = new \App\Models\Work();
        }else{
            $work = \App\Models\Work::find($request->id);   
        }

        $path = null;
        if(null  !== $request->file('header')  && $request->file('header')->isValid() ){
            $path = $request->file('header')->store('static_images', 'statics');
        }
        $icon = null;
        if(null  !== $request->file('icon')  && $request->file('icon')->isValid() ){
            //$icon = $request->file('icon')->store('static_images', 'statics');
            $icon = Storage::putFile('static_images', $request->file('icon'));
        }
        $slug = Str::slug($request->title, '-');

        $work->title = $request->title;
        $work->slug = $slug;
        $work->role = $request->role;
        $work->url = $request->url;
        $work->excerpt = $request->excerpt;
        $work->description = $request->description;
        if($path !== null){
            $work->header = Storage::url($path);
        }
        if($icon !== null){
            $work->icon = Storage::url($icon);
        }
        if($request->portofolio_id !== null){
            $work->portofolio_id = $request->portofolio_id;
        }
        if(empty($request->id)){
            $work->save();
        }else{
            $work->update();   
        }

        if(!empty($request->collaborators)){
            foreach($request->collaborators as $key => $collab){
                $path = null;
                if(null  !== $collab['avatar']){
                    $path = Storage::putFile('static_images', $collab['avatar']);
                }  
                $collaborator = new \App\Models\Collaborator();
                $collaborator->name = $collab['name'];
                $collaborator->role = $collab['role'];
                if($path !== null){
                    $collaborator->avatar = Storage::url($path);
                }
                $collaborator->url = $collab['url'];
                $collaborator->save();

                $work_collab = new \App\Models\WorkCollaborator();
                $work_collab->work_id = $work->id;
                $work_collab->collaborator_id = $collaborator->id;
                $work_collab->save();
            }
        }

        if(!empty($request->skills)){
            foreach($request->skills as $skill){
                $work_skill = new \App\Models\WorkSkill();
                $work_skill->work_id = $work->id;
                $work_skill->skill_id = $skill['id'];
                $work_skill->save();
            }
        }

        if(!empty($request->services)){
            foreach($request->services as $service){
                $work_service = new \App\Models\WorkService();
                $work_service->work_id = $work->id;
                $work_service->service_id = $service['id'];
                $work_service->save();
            }
        }

        if(!empty($request->clients)){
            foreach($request->clients as $client){
                $work_client = new \App\Models\WorkClient();
                $work_client->work_id = $work->id;
                $work_client->client_id = $client['id'];
                $work_client->save();
            }
        }

        return redirect(route('manage-works'))->with('success', 'Project created.');

    } 

    /***
     * edit Work view
     */
    public function updateWork(Request $request, $id){
        $work = \App\Models\Work::where('id', $id)->with(['portofolio'])->first();
        $portofolios = \App\Models\Portofolio::with(['skills:id,portofolio_id,title', 'services:id,portofolio_id,title', 'clients:id,portofolio_id,title'])->get();
        $clients = \App\Models\Client::all();
        $services = \App\Models\Service::all();
        $skills = \App\Models\Skill::all();
        return Inertia::render('Work/NewWork', [
            'work' => $work,
            'portofolios' => $portofolios,
            'id' => (int)$id,
            'skills' => $skills,
            'services' => $services,
            'clients' => $clients
        ]);
       
    } 


    /***
     * Manage Work Details
     */
    public function deleteWork(Request $request){
        $works = \App\Models\Work::where('id', $request->id)->delete();
        return redirect(route('manage-works'))->with('success', 'Project deleted.');
    } 

    /***
     * Manage Work Icon
     */
    public function deleteWorkIcon(Request $request){
        $works = \App\Models\Work::where('id', $request->id)->first();
        Storage::delete($work->icon);
        $work->icon = null;
        $work->update();

        return redirect()->back()->with('success', 'Project icon deleted.');
    } 

    /***
     * Manage Work Header
     */
    public function deleteWorkHeader(Request $request){
        $works = \App\Models\Work::where('id', $request->id)->first();
        Storage::delete($work->header);
        $work->header = null;
        $work->update();

        return redirect()->back()->with('success', 'Project header deleted.');
    } 

    /************************************************
     *************Manage Site details**********
     ***********************************************/


    /**
     * Manage Site layout
     */
    public function updateLayout(Request $request)
    {

        $data = $request->validateWithBag('updateSiteLayout',[
            'layout' => ['required', 'string', 'min:3']
        ]);

        $siteconfig =\App\Models\SiteConfig::first(); 
        if(empty($siteconfig)){
            return redirect()->back()->with("error", "Site not found");
        }
        $siteconfig->layout = $request->layout;
        
        $siteconfig->update();

        return redirect()->back()->with("success", "Site updated");
    }

    /**
     * Manage Site endpoint
     */
    public function updateSite(Request $request)
    {

        $data = $request->validateWithBag('updateSiteInformation',[
            'siteconfig_id' => ['required', 'integer', 'min:1'],
            'title' => ['required', 'string', 'min:3'],
            'subtitle' => ['required', 'string', 'min:3'],
            'name' => ['required', 'string', 'min:3'],
            'site_header' => ['required', 'string', 'min:3'],
            'bio' => ['required', 'string', 'min:3']
        ]);

        $siteconfig = \App\Models\SiteConfig::find($request->siteconfig_id); 
        $siteconfig->title = $request->title; 
        $siteconfig->subtitle = $request->subtitle; 
        $siteconfig->name = $request->name; 
        $siteconfig->bio = $request->bio; 
        $siteconfig->site_header = $request->site_header;
        
        $siteconfig->update();

        return redirect()->back()->with("success", "Site updated");
    }


}
