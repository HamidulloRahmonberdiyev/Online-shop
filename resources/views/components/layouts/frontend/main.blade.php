<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title ?? __('Bosh sahifa') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('frontend') }}/img/spotify.webp" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">

    <!-- Font Awesome -->
    <link href="{{ asset('frontend') }}/fontawesome-5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="/">{{ __('Biz haqimizda') }}</a>
                    <a class="text-body mr-3" href="{{ route('contact') }}">{{ __('Aloqa') }}</a>
                    <a class="text-body mr-3" href="{{ route('contact') }}">{{ __('Yordam') }}</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                            data-toggle="dropdown">{{ __('Mening hisobim') }}</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            @auth
                                <span class="p-3"><b>{{ Auth::user()->name }}</b></span>
                            @endauth
                            <a href="{{ route('front.register') }}" type="submit"
                                class="ml-3">{{ __('Ro\'yhatdan o\'tish') }}</a>
                            <a href="{{ route('front.login') }}" type="submit"
                                class="ml-3">{{ __('Kirish') }}</a><br>
                            <a href="{{ route('front.logout') }}" type="submit"
                                class="ml-3">{{ __('Chiqish') }}</a><br>
                            <a href="{{ route('front.orders') }}" type="submit" class="ml-3">{{ __('Hisobim') }}</a>
                        </div>
                    </div>
                    <div class="btn-group ml-2">
                        @if (app()->getLocale() == 'uz')
                            <a type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><img
                                    src="{{ asset('frontend') }}/flags/4x3/uz.svg" alt="" class="flag-lang">
                                UZ</a>
                        @elseif (app()->getLocale() == 'en')
                            <a type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><img
                                    src="{{ asset('frontend') }}/flags/4x3/us.svg" alt="" class="flag-lang">
                                EN</a>
                        @elseif (app()->getLocale() == 'ru')
                            <a type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><img
                                    src="{{ asset('frontend') }}/flags/4x3/ru.svg" alt="" class="flag-lang">
                                RU</a>
                        @endif
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('locale.change', ['locale' => 'uz']) }}" class="dropdown-item"
                                type="submit"><img src="{{ asset('frontend') }}/flags/4x3/uz.svg" alt=""
                                    class="flag-lang"> UZ</a>
                            <a href="{{ route('locale.change', ['locale' => 'en']) }}" class="dropdown-item"
                                type="submit"><img src="{{ asset('frontend') }}/flags/4x3/us.svg" alt=""
                                    class="flag-lang"> EN</a>
                            <a href="{{ route('locale.change', ['locale' => 'ru']) }}" class="dropdown-item"
                                type="submit"><img src="{{ asset('frontend') }}/flags/4x3/ru.svg" alt=""
                                    class="flag-lang"> RU</a>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="{{ route('front.storeds') }}" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle"
                            style="padding-bottom: 2px;">@auth {{ Auth::user()->storeds()->count() }}
                            @else
                            0 @endauth
                        </span>
                    </a>
                    <a href="{{ route('front.orders') }}" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle"
                            style="padding-bottom: 2px;">@auth {{ Auth::user()->orders()->count() }}
                            @else
                            0 @endauth
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Dark</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">net</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="{{ route('search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="{{ __('Mahsulotni qidirish') }}">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">{{ __('Murojat uchun') }}</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <x-layouts.frontend.navbar></x-layouts.frontend.navbar>
    <!-- Navbar End -->


    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>


    {{ $slot }}


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">{{ __('Manzil') }}</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed
                    dolor. Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">{{ __('Asosiy') }}</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2 {{ Request::is('/') ? 'active' : '' }}" href="/"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('Bosh sahifa') }}</a>
                            <a class="text-secondary mb-2 {{ Request::is('products') ? 'active' : '' }}"
                                href="{{ route('front.products') }}"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('Mahsulotlar') }}</a>
                            <a class="text-secondary mb-2 {{ Request::is('storeds') ? 'active' : '' }}"
                                href="{{ route('front.storeds') }}"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('Saqlanganlar') }}</a>
                            <a class="text-secondary mb-2 {{ Request::is('orders') ? 'active' : '' }}"
                                href="{{ route('front.orders') }}"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('Buyurtmalarim') }}</a>
                            <a class="text-secondary mb-2 {{ Request::is('contact') ? 'active' : '' }}"
                                href="{{ route('contact') }}"><i
                                    class="fa fa-angle-right mr-2"></i>{{ __('Aloqa') }}</a>

                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">{{ __('Mening hisobim') }}</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>
                                {{ __('Hisobim') }}</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>
                                {{ __('Ro\'yhatdan o\'tish') }}</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>
                                {{ __('Kirish') }}</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">{{ __('Onlayn xizmatimizga obuna bo\'ling') }}
                        </h5>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="{{ __('Email') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">{{ __('Obuna bo\'lish') }}</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-camelcase mt-4 mb-3">
                            {{ __('Ijtimoiy tarmoqdagi sahifalarimiz') }}</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-telegram"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="https://t.me/hamidullo_rahmonberdiyev">Sayt asoschisi
                        Hamidullo Rahmonberdiyev</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="/" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('frontend') }}/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('frontend') }}/mail/jqBootstrapValidation.min.js"></script>
    <script src="{{ asset('frontend') }}/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend') }}/js/main.js"></script>

</body>

</html>
