<x-layouts.backend.admin>

    <x-slot:title>
        Mahsulotlar / Tahrirlash / {{ $product->name }}
    </x-slot:title>

    <x-layouts.backend.header>
        Mahsulotlar / Tahrirlash / {{ $product->name }}
    </x-layouts.backend.header>

    <div class="row">
        <div class="col-md-12">
            <div class="card col-7 card-default">
                <div class="card-header">
                    <h2 class="card-title">Tahrirlash / {{ $product->name }}</h2>
                </div>
                <div class="card-body p-0">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="bs-stepper-content">
                            <div id="logins-part" class="col-12" role="tabpanel" aria-labelledby="logins-part-trigger">
                                
                                <div class="form-group"><br><br>
                                    <label for="exampleInputEmail1">Mahsulot nomi</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Mahsulot nomi">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategoriya</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)                      
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mavjud ranglar</label>
                                    <select name="modifications[]" multiple style="width:100%">
                                        @foreach ($modifications as $modification)                                         
                                            <option value="{{ $modification->id }}">{{ $modification->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('modifications')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Narx</label>
                                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" placeholder="Narx">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Avvalgi narx</label>
                                    <input type="number" name="old_price" class="form-control" value="{{ $product->old_price }}" placeholder="Avvalgi narx">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ma'lumot</label>
                                    <textarea name="content" rows="4" class="form-control" placeholder="Ma'lumot">{{ $product->content }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Rasm</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="images[]" multiple class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Rasm tanlash</label>
                                        </div>
                                    </div>
                                    @error('images')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div><br>

                                <button type="submit" class="btn btn-primary">Saqlash</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-layouts.backend.admin>
