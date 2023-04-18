<x-layouts.backend.admin>

    <x-slot:title>
        Mahsulotlar / {{ $product->name }}
    </x-slot:title>

    <x-layouts.backend.header>
        Mahsulotlar / {{ $product->name }} 
    </x-layouts.backend.header>

    <div class="row">
        <div class="col-12 col-sm-6">
          <h3 class="d-inline-block d-sm-none">{{ $product->name }} </h3>
          <div class="col-11">
               @foreach ($product->images as $image)
                    <img src="{{ asset('storage/' . $image->image) }}" class="product-image" alt="Product Image">
               @break
               @endforeach
        </div>
          <div class="col-12 product-image-thumbs">
                @foreach ($product->images as $image)
                    <div class="product-image-thumb"><img src="{{ asset('storage/' . $image->image) }}" alt="Product Image" style="width:40px"></div>     
                @endforeach
          </div>
        </div>
        <div class="col-12 col-sm-6">
          <h3 class="my-3">{{ $product->name }} </h3>
          <p>{{ $product->content }} </p>
          <hr>
          <h4>Mavjud ranglar</h4>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            @foreach ($product->modifications as $modification)      
            <label class="btn btn-default text-center active">
              <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
              {{ $modification->name }}
              <br>
              @if ($modification->name == 'Qora')
                <i class="fas fa-circle fa-2x text-dark"></i>
              @elseif ($modification->name == 'Oq')
                <i class="fas fa-circle fa-2x text-white"></i>
                @elseif ($modification->name == 'Sariq')
                <i class="fas fa-circle fa-2x text-warning"></i>
                @elseif ($modification->name == 'Qizil')
                <i class="fas fa-circle fa-2x text-danger"></i>
                @elseif ($modification->name == 'Yashil')
                <i class="fas fa-circle fa-2x text-success"></i>
                @elseif ($modification->name == 'Kulrang')
                <i class="fas fa-circle fa-2x text-secondary"></i>
                @elseif ($modification->name == 'Ko\'k')
                <i class="fas fa-circle fa-2x text-primary"></i>
                @elseif ($modification->name == 'Havorang')
                <i class="fas fa-circle fa-2x text-info"></i>
                @else
                <i class="fas fa-circle fa-2x"></i>
              @endif
            </label>
            @endforeach
          </div>

          <div class="bg-gray py-2 px-3 mt-4">
            <h2 class="mb-0">
                {{ $product->price }} so'm
            </h2>
            <h4 class="mt-0">
              <small>Avvalgi narx: {{ $product->old_price }} so'm </small>
            </h4>
          </div>

          <div class="mt-4">
            <div class="btn btn-success btn-lg btn-flat">
                <a href="{{ route('products.edit', $product->id)}}" class="text-white">
                    <i class="fas fa-pen fa-lg mr-2"></i>
                    Tahrirlash
                </a>
            </div>
          </div>

        </div>
      </div><br><br>

</x-layouts.backend.admin>
