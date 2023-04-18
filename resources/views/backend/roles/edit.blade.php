<x-layouts.backend.admin>

    <x-slot:title>
        Role / Edit / {{ $role->name }}
    </x-slot:title>

    <x-layouts.backend.header>
         Role / Edit / {{ $role->name }}
    </x-layouts.backend.header>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="card-title">Role edit </h2>
                </div>
                <div class="card-body p-0">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="bs-stepper-content">
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group"><br><br>
                                    <label for="exampleInputEmail1">Role name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $role->name }}" placeholder="Role name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-layouts.backend.admin>
