<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function siteConfigTheme(Request $request){
        $config = @$request->user()->site_config;
        $theme = 'landrick';
        if($config && $config->theme){
            $theme = $config->theme;
        }
        return $theme;
    }
}
