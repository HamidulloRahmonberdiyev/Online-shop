<x-layouts.frontend.main>

    <x-slot:title>
       {{ __('Mahsulotlar') }}
    </x-slot:title>

    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">{{ __('Kategoriyalar') }}</span></h5>
                <div class="bg-light p-4 mb-30">
                    @foreach ($categories as $category)
                        <div class="custom-control custom-checkbox d-flex justify-content-between mb-3">
                            <a href="{{ route('front.categories.category',  $category->id) }}" type="submit">
                            <h6>{{ $category->name }}
                            <span> ({{ $category->products->count() }})</span></h6></a>
                        </div>
                    @endforeach
                </div>
                <!-- Price End -->

            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 mb-5">
                
                    </div>
                @if ($products->count())                      
                    @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <div id="vendor-carousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner bg-light">
                                        @foreach ($product->images as $image)                                         
                                            <img class="w-100 h-100" src="{{ asset('storage/' . $image->image) }}" alt="Image">
                                        @break
                                        @endforeach
                                    </div>
                                </div>
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
                                <a class="h5 text-decoration-none text-truncate" href="{{ route('front.products.show', $product->id) }}">{{ $product->name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ number_format($product->price, 0, '') }} so'm</h5><h6 class="text-muted ml-2"><del>{{ number_format($product->price, 0, '') }} so'm</del></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12 text-center">
                        <nav>
                        <h3><i class="fas fa-search"></i> Qidiruv bo'yicha natija topilmadi...</h3>
                        </nav>
                    </div>
                    @endif  
                    <div class="col-12 text-center">
                        <nav>
                          {{ $products->links() }}
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>

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
