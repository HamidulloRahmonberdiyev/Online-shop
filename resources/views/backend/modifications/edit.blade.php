<x-layouts.backend.admin>

    <x-slot:title>
        Ranglar / Tahrirlash / {{ $modification->name }}
    </x-slot:title>

    <x-layouts.backend.header>
        Ranglar / Tahrirlash / {{ $modification->name }}
    </x-layouts.backend.header>

    <div class="row">
        <div class="col-md-12">
            <div class="card col-8 card-default">
                <div class="card-header">
                    <h2 class="card-title">Tahrirlash / {{ $modification->name }}</h2>
                </div>
                <div class="card-body p-0">
                    <form action="{{ route('modifications.update', $modification->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="bs-stepper-content">
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group"><br><br>
                                    <label for="exampleInputEmail1">Rang nomi</label>
                                    <input type="text" name="name" class="form-control" value="{{ $modification->name }}" placeholder="Rang nomi">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
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
