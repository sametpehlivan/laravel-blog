@extends('back.layouts.master')
@section('title','Makale Oluştur')
@section('content')
<div class="card shadow my-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
        Makale Oluştur
        </h6>
    </div>
    <div class="card-body">

        @if($errors->any())
            <div class="" id="submitErrorMessage" >
                @foreach($errors->all() as $error)
                    <div class="text-center text-danger mb-3">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div class="" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">{{session('success')}}</div>
                    <br />
                </div>
            </div>
        @endif
        <form class="user" method="post" action="{{route('admin.articles.store')}}" enctype ="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">İsim Soyisim </label>
                <input value="{{old('name')}}" type="text" class="form-control "
                       id="name" name="name"
                       placeholder="Author Full Name" required >
            </div>
            <div class="form-group">
                <select class="form-control"  name="category" id="category" placeholder="Kategoriler" required >
                    <option value="" disabled selected>Seçiniz</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == old('category') ? 'selected' : ''}}>{{$category->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Başlık </label>
                <input value="{{old('title')}}" type="text" class="form-control "
                       id="title" name="title"
                       placeholder="Title" required >
            </div>
            <div class="form-group">
                <label for="content">Yazı/Makale </label>
                <textarea class="form-control" id="content" name="content" placeholder="Writing/Article">{{old('content')}}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Açıklama</label>
                <input value="{{old('description')}}" type="text" class="form-control "
                       id="description" name="description"
                       placeholder="Description" required >
            </div>
            <div class="form-group">
                <label for="image">Fotoğraf</label>
                <input type="file" id="image" name="image"
                       placeholder="Phtograph" accept=".gif,.jpg,.jpeg,.png" required >
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Gönder
            </button>


        </form>

    </div>

</div>
@endsection
