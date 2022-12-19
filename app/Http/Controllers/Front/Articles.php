<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;


class Articles extends Controller
{
    //
    public function index()
    {
        $data['articles'] = Article::orderBy('created_at','DESC')->whereNull('deleted_at')->paginate(2);

        $data['slug'] = '';
        return view('front.home',$data);
    }
    public function show($slug)
    {
        $category = Category::where('slug',$slug)->first();


        return view('front.home')->with([
            'articles' => $category->articles()->paginate(2),
            'slug' => $slug,

        ]);
    }
    public function single($slug)
    {
        $article = Article::where('slug',$slug)->first();

        return view('front.article-detail')->with([
            'article' => $article,
            'slug' => $article->getCategory->slug,

        ]);
    }
}
