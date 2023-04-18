<x-layouts.backend.admin>

    <x-slot:title>
        Kategoriya / Tahrirlash / {{ $category->name }}
    </x-slot:title>

    <x-layouts.backend.header>
        Kategoriya / Tahrirlash / {{ $category->name }}
    </x-layouts.backend.header>

    <div class="row">
        <div class="col-md-12">
            <div class="card col-8 card-default">
                <div class="card-header">
                    <h2 class="card-title">Kategoriya / Tahrirlash / {{ $category->name }} </h2>
                </div>
                <div class="card-body p-0">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="bs-stepper-content">
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group"><br><br>
                                    <label for="exampleInputEmail1">Kategoriya nomi</label>
                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Kategoriya nomi">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                <div class="form-group">
                                    <label for="exampleInputFile">Rasm</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" value="{{ $category->image }}"class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Rasm tanlash</label>
                                        </div>
                                    </div>
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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
