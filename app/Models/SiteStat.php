<?php

namespace App;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteStat extends Model
{
    //
    protected $table = 'site_stats';
    public $timestamps = false;

    protected $fillable = [
        'date','count','article_count'
    ];

    public static function incrementVisit()
    {
        $date = date('Y-m-d');
        $stat = self::where('date', $date)->first();
        if(!empty($stat)){
            $stat->increment('count', 1);
        }else{
            SiteStat::create(['date' => $date, 'count' => 1, 'article_count' => 0]);
        }
    }

    public static function incrementArticleVisit()
    {
        $date = date('Y-m-d');
        $stat = self::where('date', $date)->first();
        if(!empty($stat)){
            $stat->increment('article_count', 1);
        }else{
            SiteStat::create(['date' => $date, 'count' => 0, 'article_count' => 1]);
        }
    }

}
