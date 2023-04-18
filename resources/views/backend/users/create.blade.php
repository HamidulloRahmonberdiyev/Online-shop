<x-layouts.backend.admin>

    <x-slot:title>
    Yangi foydalanuvchi
    </x-slot:title>

    <x-layouts.backend.header>
        Yangi foydalanuvchi
    </x-layouts.backend.header>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    <h2 class="card-title">Yangi foydalanuvchi </h2>
                </div>
                <div class="card-body p-0">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="bs-stepper-content">
                            <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                
                                <div class="form-group"><br><br>
                                    <label for="exampleInputEmail1">Ism</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name')}}" placeholder="Ism">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email')}}" placeholder="Email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefon raqam</label>
                                    <input type="number" name="phone" class="form-control" value="{{ old('phone')}}" placeholder="Telefon raqam">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Parol</label>
                                    <input type="password" name="password" class="form-control" value="{{ old('password')}}" placeholder="Parol">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Parol tasdiqlash</label>
                                    <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation')}}" placeholder="Parol tasdiqlash">
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Daraja</label>
                                    <select name="role_id" class="form-control">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option> 
                                        @endforeach
                                    </select>
                                    @error('role_id')
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
