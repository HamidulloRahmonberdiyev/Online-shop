<x-layouts.backend.admin>

    <x-slot:title>
        Yangi Kategoriya
    </x-slot:title>

    <x-layouts.backend.header>
        Yangi Kategoriya
    </x-layouts.backend.header>

    <div class="row">
        <div class="col-md-12">
            <div class="card col-8 card-default">
                <div class="card-header">
                    <h2 class="card-title">Yangi Kategoriya </h2>
                </div>
                <div class="card-body p-0">
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="bs-stepper-content">
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group"><br><br>
                                    <label for="exampleInputEmail1">Kategoriya nomi</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name')}}" placeholder="Kategoriya nomi">
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
                                            <input type="file" name="image" value="{{ old('image') }}" class="custom-file-input" id="exampleInputFile">
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
