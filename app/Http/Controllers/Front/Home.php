<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Page;
use Illuminate\Http\Request;

class Home extends Controller
{
    //
    public function page($page)
    {
        $data['page'] = Page::where('slug',$page)->whereNull('deleted_at')->first();
        return view('front.page',$data);
    }
}

