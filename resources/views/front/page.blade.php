@extends('front.layouts.master')
@section('title',$page->name)
@section('title_article',$page->name)
@section('content')

    <div class="col-md-12 m-0 p-0">
        <div class="col-12">
            <article class="mb-4">
                <div class="container px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7">
                            <p>
                                {{$page->content}}
                            </p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
@endsection
