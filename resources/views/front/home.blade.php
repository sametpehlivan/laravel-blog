@extends('front.layouts.master')
@section('title','Anasayfa')
@section('title_article',$slug == '' ? 'Anasayfa'  : strtoupper(str_replace('-',' ',$slug)))

@section('content')

    <div class="col-md-3 m-0 p-0">
        <x-categories :slug="$slug"> </x-categories>
    </div>
   @if(count($articles)>0)
       <div class="col-md-9">
           <div class="col-12">
               @foreach( $articles as $article)
                   @include('front.article-view',$article)
               @endforeach

               <div>
                   {{ $articles->links('pagination::bootstrap-5') }}
               </div>
           </div>


   @else
       <div class="col-md-9 p-0">
            <div class="alert alert-danger m-4 "> Yazı Bulunamadı</div>
       </div>
   @endif

@endsection

