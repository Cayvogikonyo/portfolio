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
        $main = \App\Models\Article::first();
        $posts = \App\Models\Article::paginate();
        $popular = \App\Models\Article::paginate();
        $categories = \App\Models\Category::all();
        $works = \App\Models\Work::limit(8)->get();
        \App\Models\SiteStat::incrementVisit();
        return View($site->layout, compact('posts', 'main', 'categories', 'site', 'popular', 'works'));
    }

    /**
     * View blog posts
     */
    public function blog(Request $request)
    {
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
     * View blog owner portofolio
     */
    public function portofolio(Request $request, $id = null)
    {
        if($id !== null){
            $portofolio = \App\Models\Portofolio::with(['skills', 'services', 'clients', 'experiences'])->where('id', $id)->first();
        }else{
            $portofolio = \App\Models\Portofolio::with(['skills', 'services', 'clients', 'experiences'])->first();
        }
        $works = \App\Models\Work::where('portofolio_id', $portofolio->id)->get();
        return View('portofolio', compact('portofolio', 'works'));
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
     * Work portofolio list
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
        return View('work', compact('work', 'works'));
    } 

    /**
     * Create a new mailing fan
     */
    public function newTicket(Request $request)
    {
        $request->validate([
            'name' => ['required','string', 'min:3'],
            'email' => ['required','email'],
            'message' => ['required','string', 'min:3']
        ]);

        $ticket = new \App\Models\Ticket();
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->message = $request->message;
        $ticket->save();

        return redirect()->back()->with('success', "I will get back to you in 1 to 2 days.");
    }
}
