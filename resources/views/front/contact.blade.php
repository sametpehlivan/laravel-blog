@extends('front.layouts.master')
@section('title','Iletisim')
@section('title_article','Iletisim')
@section('content')

    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>İletişime geçmek ister misiniz? Bize mesaj göndermek için aşağıdaki formu doldurun, size en kısa sürede geri döneceğiz!</p>
                    <div class="my-5">

                        @if($errors->any())
                            <div class="" id="submitErrorMessage">
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

                        <form id="contactForm" method="post" action="{{route('contact.post')}}" >
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" value="{{old('name')}}" name="name" id="name" type="text" placeholder="İsiminizi giriniz..." required />
                                <label for="name">Ad Soyad</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">İsim alanı zorunlu.</div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" value="{{old('email')}}" name="email" id="email" type="email" placeholder="Email alanını giriniz..." required />
                                <label for="email">Email Adresi</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">Email alanı zorunlu</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email alanı geçersiz.</div>
                            </div>

                            <div class="mt-4">
                                <select class="form-select"  name="subject" id="subject" placeholder="Bir mesaj konusu seçiniz..." required >
                                    <option value="" disabled selected>Seçiniz</option>
                                    @foreach($contact_subjects as $key => $value)
                                        <option value="{{$value}}" {{old('subject') == $value ? 'selected':''}} >{{$key}}</option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback" >Bir konu seçmelisiniz.</div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control"  name="message" id="message" placeholder="Buraya iletmek istediğniz mesajı yazınız..." style="height: 12rem" required> {{old('message')}}</textarea>
                                <label for="message">Mesaj</label>
                                <div class="invalid-feedback" >Mesaj alanı zorunludur.</div>
                            </div>
                            <br />
                            <button class="btn btn-primary text-uppercase " id="submitButton" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
