<x-layouts.backend.admin>

    <x-slot:title>
        Mahsulotlar
    </x-slot:title>

    <x-layouts.backend.header>
        Mahsulotlar 
    </x-layouts.backend.header>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mahsulotlar</h3>

                    <form action="{{ route('search.products') }}" method="GET" class="card-tools">
                        @csrf
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" name="search" class="form-control float-right"
                                placeholder="Qidiruv">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @if ($products->count())
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nomi</th>
                                <th>Kategoriya</th>
                                <th>Rasm</th>
                                <th>Amal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><a href="{{ route('products.show', $product->id) }}" class="text-dark">{{ $product->name }}</a></td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    @foreach ($product->images as $image)
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="" style="width:40px">      
                                    @break
                                    @endforeach
                                </td>
                                <td>
                                        <a class="nav-link" data-toggle="dropdown" href="/">
                                          <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="col-3 dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="text-left "><br>
                                                    <a class="btn btn-primary ml-2 btn-sm" href="{{ route('products.show', $product->id) }}">
                                                        <i class="fas fa-folder">
                                                        </i>
                                                        Ko'rish
                                                    </a>
                                                    <a class="btn btn-success ml-2 btn-sm" href="{{ route('products.edit', $product->id) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Tahrirlash
                                                    </a>
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm" style="margin-left:68%;margin-top:-20%"><i class="fas fa-trash"></i> O'chirish</button>
                                                    </form>
                                            </div>
                                        </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center mt-3 mb-3">
                    <h5><i class="fas fa-search"></i> Qidiruv bo'yicha natija topilmadi...</h5>
                </div>
                @endif
            </div>
            <div class="text-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>

</x-layouts.backend.admin>
