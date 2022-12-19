<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationData;
use function PHPUnit\Framework\directoryExists;

class ArticleController extends Controller
{
    public function index()
    {
        $columns = ['name'=>'Isim','title'=>'Başlık','content' =>'Metin','description'=>'Açıklama'
        ];
        $data['articles'] = Article::whereNull('deleted_at')->get();
        $data['columns'] = $columns;
        return view('back.articles.article-list',$data);
    }
    public function create()
    {
        //
        $data['categories'] = Category::whereNull('deleted_at')->get();
        return view('back.articles.article-create',$data);
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>"required|min:5|regex:/^[a-z ,.'-ğüşöçİĞÜŞÖÇ]+$/i",
            'title'=>'required|min:5',
            'content'=>'required|min:5',
            'category'=>'required|regex:/^\\d+$/',
            'description'=>'required|min:5',
            'image'=>'required|mimes:jpeg,png,.jpg|max:4096'

        ]);
        $slug = str_slug(strtolower($request->post('title')));
        $entity = Article::where('slug',$slug)->first();
        $category = Category::where('id',$request->post('category'))->first();
        if(!$category)
        {
            return back()->withErrors(['category' => 'Böyle bir kategori mevcut değil']);
        }
        if($entity)
        {
            return back()->withErrors(['title' => 'Başlık başka bir yazı tarafından kullanılıyor']);
        }

        if($request->hasFile('image'))
        {
            $imageName = $slug.'.'.$request->image->getClientOriginalExtension();

            if(!file_exists(public_path().'\uploads'))
                mkdir(public_path().'\uploads');
            $request->image->move(public_path('uploads'),$imageName);


        }
        $article = new Article;
        $article->name = $request->post('name');
        $article->category_id = $request->post('category');
        $article->title = $request->post('title');
        $article->content = $request->post('content');
        $article->slug = $slug;
        $article->description = $request->post('description');
        $article->save();
        return redirect()->route('admin.articles.index');

    }
    public function show($article)
    {
    }
    public function edit($article)
    {
        $data['article'] = Article::where('slug',$article)->first();
        if(!$data['article'])
        {
            return abort(404);
        }
        $data['categories'] = Category::whereNull('deleted_at')->get();
        return view('back.articles.article-edit',$data);
    }


    public function update(Request $request, $article)
    {


        $request->validate([
            'name'=>"required|min:5|regex:/^[a-z ,.'-ğüşöçİĞÜŞÖÇ]+$/i",
            'title'=>'required|min:5',
            'content'=>'required|min:5',
            'category'=>'required|regex:/^\\d+$/',
            'description'=>'required|min:5',
            'image'=>'required|mimes:jpeg,png,.jpg|max:4096'
        ]);
    if (!$request->slug  == $article)
        {
            return abort(404);
        }
        $slug = str_slug(strtolower($request->post('title')));
        $entity = Article::where('slug',$slug)->where('slug','!=',$article)->first();
        $category = Category::where('id',$request->post('category'))->first();

        if(!$category)
        {
            return back()->withErrors(['category' => 'Böyle bir kategori mevcut değil']);
        }
        if($entity)
        {
            return back()->withErrors(['title' => 'Başlık başka bir yazı tarafından kullanılıyor']);
        }
        $update_article = Article::where('slug',$article)->first();
        if(!$update_article)
        {
            return abort(404);
        }
        if($request->hasFile('image'))
        {
            $imageName = $slug.'.'.$request->image->getClientOriginalExtension();

            if(!file_exists(public_path().'\uploads'))
                mkdir(public_path().'\uploads');
            $request->image->move(public_path('uploads'),$imageName);


        }
        $update_article->name = $request->post('name');
        $update_article->category_id = $request->post('category');
        $update_article->title = $request->post('title');
        $update_article->content = $request->post('content');
        $update_article->slug = $slug;
        $update_article->description = $request->post('description');
        $update_article->save();
        return redirect()->route('admin.articles.index');
    }
    public function destroy($id)
    {
        //
    }
}
