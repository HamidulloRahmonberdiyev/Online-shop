<x-layouts.frontend.main>

    <x-slot:title>
       {{ __('Mahsulotlar') }} / {{ $product->name }}
    </x-slot:title>

    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        @foreach ($product->images as $image => $item)
                        <div class="carousel-item {{ $image == 0 ? 'active' : '' }}">
                            <img class="w-100 h-100" src="{{ asset('storage/' . $item->image) }}" alt="Image">
                        </div>
                        @endforeach 
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3 class="mb-3">{{ $product->name }}</h3>
                    <h4 class="font-weight-semi-bold mb-4">{{ number_format($product->price, 0, '') }} so'm</h4>
                    <p class="mb-4">{{ $product->content }}</p>
                
                <form action="{{ route('front.orders.store', $product->id) }}" method="POST">
                    @csrf

                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">{{ __('Mavjud ranglar') }}:</strong>
                            @foreach ($product->modifications as $modification)
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" value="{{ $modification->id }}" id="color-1" name="modification_id">
                                <label class="custom-control-label" for="color-1">{{ $modification->name }}</label>
                            </div>
                            @endforeach
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <a class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </a>
                            </div>
                            <input type="number" name="quantity" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <a class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> {{ __('Savatchaga qo\'shish') }}</button>
                    </div>
                </form>

                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">{{ __('Ulashish') }}:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-telegram"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">{{ __('Mahsulot haqida') }}</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="">{{ __('Izohlar') }} (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">{{ __('Mahsulot haqida') }}</h4>
                            <p>{{ $product->content }}</p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">1 review for "Product Name"</h4>
                                    <div class="media mb-4">
                                        <img src="{{ asset('frontend') }}/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Yangi mahsulotlar</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($new_products as $product)                       
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            @foreach ($product->images as $image) 
                            <div class="carousel-inner bg-light">                           
                                <img class="w-100 h-100" src="{{ asset('storage/' . $image->image) }}" alt="Image">
                            </div>
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
                            <a class="h6 text-decoration-none text-truncate" href="">{{ $product->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ number_format($product->price, 0, '') }}</h5><h6 class="text-muted ml-2"><del>{{ number_format($product->old_price, 0, '') }}</del></h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-layouts.frontend.main>