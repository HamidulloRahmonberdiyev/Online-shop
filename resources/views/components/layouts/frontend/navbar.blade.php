<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h4 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>{{ __('Menyular qatori') }}</h4>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }} ">{{ __('Bosh sahifa') }}</a>
                        
                        <a href="{{ route('front.products') }}" class="nav-item nav-link {{ Request::is('products') ? 'active' : '' }}">{{ __('Mahsulotlar') }}</a>

                        <a href="{{ route('front.storeds') }}" class="nav-item nav-link {{ Request::is('storeds') ? 'active' : '' }}">{{ __('Saqlanganlar') }}</a>
                        
                        <a href="{{ route('front.orders') }}" class="nav-item nav-link {{ Request::is('orders') ? 'active' : '' }}">{{ __('Buyurtmalarim') }}</a>
                        
                        <a href="{{ route('contact') }}" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">{{ __('Aloqa') }}</a>
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">Dark</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Net</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">{{ __('Bosh sahifa') }}</a>
                        
                        <a href="{{ route('front.products') }}" class="nav-item nav-link {{ Request::is('products') ? 'active' : '' }}">{{ __('Mahsulotlar') }}</a>

                        <a href="{{ route('front.storeds') }}" class="nav-item nav-link {{ Request::is('storeds') ? 'active' : '' }}">{{ __('Saqlanganlar') }}</a>
                        
                        <a href="{{ route('front.orders') }}" class="nav-item nav-link {{ Request::is('orders') ? 'active' : '' }}">{{ __('Buyurtmalarim') }}</a>
                        
                        <a href="{{ route('contact') }}" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">{{ __('Aloqa') }}</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="{{ route('front.storeds') }}" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">@auth {{ Auth::user()->storeds()->count() }} @else 0 @endauth</span>
                        </a>
                        <a href="{{ route('front.orders') }}" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">@auth {{ Auth::user()->orders()->count() }} @else 0 @endauth</span>
                        </a>
                    </div>
                </div>  
            </nav>
        </div>
    </div>
</div>