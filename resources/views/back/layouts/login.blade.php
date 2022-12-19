@extends('back.layouts.basehtml')
@section('title','Admin Login')
@section('body')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-9 mx-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hoşgeldiniz!</h1>
                                    </div>
                                    @if(session()->get('errors'))
                                        <div class="" id="submitErrorMessage">
                                            @foreach($errors->all() as $error)
                                                <div class="text-center text-danger mb-3">{{ $error }}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <form class="user" method="post" action="{{route('admin.login.post')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input value="{{old('email')}}" type="email" class="form-control form-control-user"
                                                   id="email" name="email" aria-describedby="emailHelp"
                                                   placeholder="Email adresinizi giriniz." required >
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" class="form-control form-control-user"
                                                   id="exampleInputPassword" placeholder="Şifrenizi Giriniz" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Beni Hatırla</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Giriş
                                        </button>


                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
