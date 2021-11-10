<?php

namespace App\Http\Controllers;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticlesResource;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
     * View home
     */
    public function home(Request $request)
    {
        $site = \App\Models\SiteConfig::first();
        if($site->layout === 'blog'){
            return redirect('blog');
        }
        $description = $site->bio;
        $title = $site->title . ' ' . $site->subtitle;
        $main = \App\Models\Article::first();
        $posts = \App\Models\Article::paginate();
        $popular = \App\Models\Article::paginate();
        $categories = \App\Models\Category::all();
        $works = \App\Models\Work::limit(8)->get();
        $skills = \App\Models\Skill::all();
        \App\Models\SiteStat::incrementVisit();

        
        // return View($site->layout, compact('posts', 'main', 'categories', 'site', 'popular', 'works','skills', 'description', 'title'));
        return View('layout2', compact('posts', 'main', 'categories', 'site', 'popular', 'works','skills', 'description', 'title'));
    }

    /**
     * View blog posts
     */
    public function blog(Request $request)
    {
        $site = \App\Models\SiteConfig::first();
        $description = $site->bio;
        $title = $site->title . ' ' . $site->subtitle;
        $site = \App\Models\SiteConfig::first();
        $posts = \App\Models\Article::paginate();
        $categories = \App\Models\BlogCategory::all();
        return View('blogs', compact('posts', 'categories', 'site'));
    }
    /**
     * View blog posts category
     */
    public function blogCategory(Request $request, $category)
    {
        $site = \App\Models\SiteConfig::first();
        $posts = \App\Models\Article::
        join('blog_categories', 'articles.category_id', '=', 'blog_categories.id')
        ->where('blog_categories.slug', $category)->paginate();
        $categories = \App\Models\BlogCategory::where('slug', '!=',$category)->get();
        $category = \App\Models\BlogCategory::where('slug', $category)->first();
        return View('blogs', compact('posts', 'categories', 'site', 'category'));
    }


    /**
     * View blog owner portfolio
     */
    public function portfolio(Request $request, $id = null)
    {
        if($id !== null){
            $portfolio = \App\Models\Portofolio::with(['skills', 'services', 'clients', 'experiences'])->where('id', $id)->first();
        }else{
            $portfolio = \App\Models\Portofolio::with(['skills', 'services', 'clients', 'experiences'])->first();
        }
        $image = $portfolio->avatar;
        $description = $portfolio->bio;
        $title = $portfolio->name . '::.' . $portfolio->title;
        $works = \App\Models\Work::where('portofolio_id', $portfolio->id)->get();
        return View('portfolio', compact('portfolio', 'works', 'description', 'title', 'image'));
    }

    /**
     * View article
     */
    public function getArticle(Request $request, $slug)
    {
        $post = \App\Models\Article::where('slug', $slug)->with('categories')->first();
        if(empty($post)){
            abort(404);
        }
        \App\Models\SiteStat::incrementArticleVisit();
        return View('article', compact('post'));
    }

    /**
     * Work portfolio list
     */
    public function workPortofolio(Request $request)
    {
        $works = \App\Models\Work::all();
        $categories = \App\Models\Skill::all();
        return View('work_portofolio', compact('works', 'categories'));
    }


    /***
     * View Work Details
     */
    public function viewWork(Request $request, $id){
        $work = \App\Models\Work::where('slug', $id)->first();
        $works = \App\Models\Work::where('slug','!=',  $id)->limit(6)->get();
        if(empty($work)){
            abort(404);
        }
        $image = $work->header;
        $description = $work->excerpt;
        $title = $work->title . '::.' . $work->role;
        return View('work', compact('work', 'works', 'image', 'description', 'title'));
    } 

    /**
     * Create a new mailing fan
     */
    public function newTicket(Request $request)
    {
        $request->validate([
            'name' => ['required','string', 'min:3'],
            'email' => ['required','email'],
            'extra' => ['nullable','string'],
            'message' => ['required','string', 'min:3']
        ]);

        if(!empty($request->extra)){
            abort(404);
        }

        $ticket = new \App\Models\Ticket();
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->message = $request->message;
        $ticket->save();

        return redirect()->back()->with('success', "I will get back to you in 1 to 2 days.");
    }
}
