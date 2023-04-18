<x-layouts.backend.admin>

    <x-slot:title>
        Create Role
    </x-slot:title>

    <x-layouts.backend.header>
        Create Role
    </x-layouts.backend.header>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="card-title">Create Role </h2>
                </div>
                <div class="card-body p-0">
                    <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="bs-stepper-content">
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                <div class="form-group"><br><br>
                                    <label for="exampleInputEmail1">Role name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name')}}" placeholder="Role name">
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
