@extends('front.layouts.master')
@section('title',$article->title)
@section('title_article',$article->title)
@section('title_author',$article->name)
@section('content')
    <div class="col-md-3 m-0 p-0">
        <x-categories :slug="$slug"> </x-categories>
    </div>
    <div class="col-md-9 m-0 p-0">
        <div class="col-12">
            <article class="mb-4">
                <div class="container px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7">
                            <p>
                                {{$article->content}}
                            </p>
                            <div class="post-preview">
                                <p class="post-meta">
                                    <span>{{ $article->name }} tarafından oluşturuldu </span>
                                    <span class="float-end">{{ $article->getCategory->created_at->diffForHumans() }}</span>
                                </p>
                                <p class="post-meta">
                                    Kategori : <a href={{ route('articlesbycategory',$article->getCategory->slug) }}>{{strtoupper($article->getCategory->name)}}</a>
                                </p>


                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
@endsection
