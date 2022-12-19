@extends('back.layouts.basehtml')
@section('title','Dashboard')
@section('body')
    <div id="wrapper">
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        @include('back.partials.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('back.partials.navbar')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('back.partials.logout')
    @include('back.partials.footer')
    @yield('extra-scripst')
@endsection
