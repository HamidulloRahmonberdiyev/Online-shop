<x-layouts.frontend.main>

    <x-slot:title>
       {{ __('Hisobim') }}
    </x-slot:title>

    <div class="container-fluid">
        <div class="row px-xl-5">
            @if (Auth::user()->orders()->count())             
            <div class="col-lg-7 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('Rasm') }}</th>
                            <th>{{ __('Mahsulot') }}</th>
                            <th>{{ __('Soni') }}</th>
                            <th>{{ __('Narx') }}</th>
                            <th>{{ __('Bekor qilish') }}</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($orders as $order)
                        <tr>
                            <td class="align-middle">
                                <a href="{{ route('front.products.show', $order->product->id) }}">
                                @foreach ($order->product->images as $image)
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="" style="width: 50px;">
                                @break
                                @endforeach
                                </a>
                            </td>
                            <td class="align-middle"><a href="{{ route('front.products.show', $order->product->id) }}" class="text-dark">{{ $order->product->name }}</a></td>
                            <td class="align-middle">{{ $order->quantity }}</td>
                            <td class="align-middle">{{ number_format(($order->quantity * $order->product->price), 0, '') }} so'm</td>
                            <td class="align-middle">
                                <form action="{{ route('front.orders.destroy', $order->id)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm" style="font-size:20px"><i class="fa fa-times text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">{{ __('Umumiy hisob') }}</span></h5>
                <div class="bg-light p-30 mb-5">                
                    <div class="pt-2">
                        <a href="{{ route('front.order.confirmation') }}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">{{ __('Buyurtmani tasdiqlash') }}</a>
                    </div>      
                        <a href="{{ route('front.orders.destroy.all') }}" type="submit" class="btn btn-block btn-danger font-weight-bold my-3 py-3">{{ __('Bekor qilish') }}</a>
                </div>
            </div>
            @else
                <div class="col-12 text-center mb-5"><br>
                    <h4><b>{{ __('Sizda hozircha buyurtmalar mavjud emas') }}</b></h4>
                </div>
            @endif
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