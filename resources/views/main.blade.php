<x-layouts.frontend.main>

    <x-slot:title>
       {{ __('Bosh sahifa') }}
    </x-slot:title>

<!-- Carousel Start -->
<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#header-carousel" data-slide-to="1"></li>
                    <li data-target="#header-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item position-relative active" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="{{ asset('frontend')}}/img/product-4.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">{{ __('Kiyimlar') }}</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('front.products') }}">{{ __('Xariq qilish') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="{{ asset('frontend')}}/img/tv.png" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">{{ __('Elektrotexnika vositalari') }}</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('front.products') }}">{{ __('Xariq qilish') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="{{ asset('frontend')}}/img/divan.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">{{ __('Uy jihozlari') }}</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="{{ route('front.products') }}">{{ __('Xariq qilish') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
        @foreach ($discount_products as $product)
            <div class="product-offer mb-30" style="height: 200px;">
                @foreach ($product->images as $image)
                    <img class="img-fluid" src="{{ asset('storage/' . $image->image) }}" alt="">
                @break
                @endforeach
                <div class="offer-text">
                    <h1 style="font-size:60px;color:#FFD333"><b>{{ Str::limit($string = ($product->old_price - $product->price) / ($product->old_price / 100), 2, '') }}%</b></h1>
                    <h3 class="text-white mb-3">{{ $product->name }}</h3>
                    <a href="{{ route('front.products.show', $product->id) }}" class="btn btn-primary">{{ __('Xarid qilish') }}</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <a href="{{ route('front.products') }}" type="submit">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">{{ __('Sifatli mahsulotlar') }}</h5>
            </div></a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <a href="{{ route('front.products') }}" type="submit">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt  text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">{{ __('Chegirmalar') }}</h5>
            </div></a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <a href="{{ route('front.products') }}" type="submit">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">{{ __('Bepul yetkazib  berish') }}</h5>
            </div></a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <a href="{{ route('contact') }}" type="submit">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 {{ __('Xizmatingizdamiz') }}</h5>
            </div></a>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{ __('Kategoriyalar') }}</span></h2>
    <div class="row px-xl-5 pb-3">
        @foreach ($categories as $category)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <a class="text-decoration-none" href="{{ route('front.categories.category',  $category->id) }}">
                <div class="cat-item d-flex align-items-center mb-4">
                    <div class="overflow-hidden" style="width: 100px; height: 100px;">
                        <img class="img-fluid" src="{{ asset('storage/' . $category->image) }}" alt="">
                    </div>
                    <div class="flex-fill pl-3">
                        <h5>{{ $category->name }}</h5>
                        <small class="text-body h6">({{ $category->products->count() }})</small>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
<!-- Categories End -->


<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{ __(' Yangi Mahsulotlar') }}</span></h2>
    <div class="row px-xl-5">

    @foreach ($latest_products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    @foreach ($product->images as $image)                                         
                        <img class="w-100 h-100" src="{{ asset('storage/' . $image->image) }}" alt="Image">
                    @break
                    @endforeach
                    <div class="product-action">
                        <a class="btn btn-outline-dark btn-square">
                            <form action="{{ route('front.orders.store', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-outline-dark btn-square"><i class="fa fa-shopping-cart"></i></button>
                            </form></a>
                            <a type="button" class="btn btn-outline-dark btn-square">
                            <form action="{{ route('front.storeds.store', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-outline-dark btn-square"><i class="fa fa-heart"></i></button>
                            </form></a>
                        <a class="btn btn-outline-dark btn-square" href="{{ route('front.products.show', $product->id) }}"><i class="fa fa-sync-alt"></i></a>
                        <a class="btn btn-outline-dark btn-square" href="{{ route('front.products.show', $product->id) }}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h4 text-decoration-none text-truncate" href="{{ route('front.products.show', $product->id) }}">{{ $product->name }}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>{{ number_format($product->price, 0, '') }} so'm</h5><h6 class="text-muted ml-2"><del>{{ number_format($product->old_price, 0, '') }} so'm</del></h6>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Products End -->


<!-- Offer Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="row px-xl-5">
        @foreach ($discount_products as $product)
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                @foreach ($product->images as $image)
                    <img class="img-fluid" src="{{ asset('storage/' . $image->image) }}" alt="">
                @break
                @endforeach
                <div class="offer-text">
                    <h1 style="font-size:90px;color:#FFD333"><b>{{ Str::limit( $string = ($product->old_price - $product->price) / ($product->old_price / 100), 2, '') }}%</b></h1>
                    <h3 class="text-white mb-3">{{ $product->name }}</h3>
                    <a href="{{ route('front.products.show', $product->id) }}" class="btn btn-primary">{{ __('Xarid qilish') }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Offer End -->


<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{ __('Yaqinda ko\'rilgan') }}</span></h2>
    <div class="row px-xl-5">
        @foreach ($recent_products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    @foreach ($product->images as $image)                                         
                        <img class="w-100 h-100" src="{{ asset('storage/' . $image->image) }}" alt="Image">
                    @break
                    @endforeach
                    <div class="product-action">
                        <a class="btn btn-outline-dark btn-square">
                            <form action="{{ route('front.orders.store', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-outline-dark btn-square"><i class="fa fa-shopping-cart"></i></button>
                            </form></a>
                            <a type="button" class="btn btn-outline-dark btn-square">
                            <form action="{{ route('front.storeds.store', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-outline-dark btn-square"><i class="fa fa-heart"></i></button>
                            </form></a>
                        <a class="btn btn-outline-dark btn-square" href="{{ route('front.products.show', $product->id) }}"><i class="fa fa-sync-alt"></i></a>
                        <a class="btn btn-outline-dark btn-square" href="{{ route('front.products.show', $product->id) }}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h4 text-decoration-none text-truncate" href="{{ route('front.products.show', $product->id) }}">{{ $product->name }}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>{{ number_format($product->price, 0, '') }} so'm</h5><h6 class="text-muted ml-2"><del>{{ number_format($product->old_price, 0, '') }} so'm</del></h6>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Products End -->

<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                @foreach ($categories as $category)               
                    <div class="bg-light p-4">
                        <a href="{{ route('front.categories.category',  $category->id) }}">
                            <img src="{{ asset('storage/' . $category->image) }}" class="mb-3" alt="">
                            <h6 class="text-center">{{ $category->name }}</h6>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

</x-layouts.frontend.main>