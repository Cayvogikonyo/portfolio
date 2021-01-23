<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use \App\Models\Category;
use \App\Models\ArticleCategory;
class Article extends Model
{
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }


    public function categories()
    {
        return $this->hasManyThrough(Category::class, ArticleCategory::class,'category_id', 'id');
    }

    /**
     * Prepare header url
     */
    public function headerUrl()
    {
        if(empty($this->header)){
            return null;//"https://mblogstatics.s3.amazonaws.com/static_images/default.jpg";
        }
        return 'https://mblogstatics.s3.us-east-1.amazonaws.com/'.$this->header;
    }

    /**
     * Obtain public claps for the post
     */
    public function claps()
    {
        return 0;
    }

    /**
     * Increment view for every visit
     */
    public function incrementViews()
    {
        DB::table('articles')->increment('views', 1);
    }
}
