<!-- Navigation-->
<x-navbar></x-navbar>
<!-- Page Header-->
<header class="masthead" style="background-image: url('{{asset('front/')}}/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>@yield('title_article','Blog Sitesi')</h1>
                    <span class="subheading">@yield('title_author','En cici blog sitesi')</span>
                </div>
            </div>
        </div>
    </div>
</header>
