<x-layouts.frontend.main>

    <x-slot:title>
       {{ __('Saqlanganlar') }}
    </x-slot:title>

    <div class="container">
        <div class="row px-xl-5">

            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-8"><br>
                <div class="row pb-3">
                    @if (Auth::user()->storeds()->count())

                    @foreach ($storeds as $stored)
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <form action="{{ route('front.storeds.destroy', $stored->id)}}" method="POST">
                                @csrf
                                <button class="btn btn-sm"  style="margin-left:90%;font-size:20px"><i class="fa fa-times"></i></button>
                            </form>
                            <div class="product-img position-relative overflow-hidden">
                                @foreach ($stored->product->images as $image)                                         
                                    <img class="w-100 h-100" src="{{ asset('storage/' . $image->image) }}" alt="Image">
                                @break
                                @endforeach
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square">
                                    <form action="{{ route('front.orders.store', $stored->product->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="product_id" value="{{ $stored->product->id }}">
                                        <button class="btn btn-outline-dark btn-square"><i class="fa fa-shopping-cart"></i></button>
                                    </form></a>
                                    <a class="btn btn-outline-dark btn-square ml-1" href="{{ route('front.products.show', $stored->product->id) }}"><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href="{{ route('front.products.show', $stored->product->id) }}"><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href="{{ route('front.products.show', $stored->product->id) }}"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h5 text-decoration-none text-truncate" href="{{ route('front.products.show', $stored->product->id) }}">{{ $stored->product->name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ number_format($stored->product->price, 0, '') }} so'm</h5><h6 class="text-muted ml-2"><del>{{ number_format($stored->product->old_price, 0, '') }} so'm</del></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @else
                        <div class="col-12 text-center mb-5">
                            <h4><b>Sizda hozircha saqlangan mahsulotlar mavjud emas</b></h4>
                        </div>
                    @endif
                    <div class="col-12">
                        <nav>
                          {{ $storeds->links() }}
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
