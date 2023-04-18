<x-layouts.backend.admin>

    <x-slot:title>
        Foydalanuvchilar
    </x-slot:title>

    <x-layouts.backend.header>
        Foydalanuvchilar
    </x-layouts.backend.header>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Foydalanuvchilar</h3>
                    <form action="{{ route('search.users') }}" method="GET" class="card-tools">
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
              @if ($users->count())
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ism</th>
                                <th>Email</th>
                                <th>Telefon raqam</th>
                                <th>Daraja</th>
                                <th>Amal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="{{ route('users.edit', $user->id) }}"
                                            class="text-dark">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-primary">{{ $user->phone }}</td>
                                    <td>
                                        <button class="btn btn-light">
                                            @if ($user->role_id > 2)
                                                <b class="text-info">{{ $user->role_id ? 'Admin' : $user->role_id }}</b>
                                            @elseif ($user->role_id > 1)
                                                <b
                                                    class="text-success">{{ $user->role_id ? 'Manager' : $user->role_id }}</b>
                                            @elseif ($user->role_id == 1)
                                                <b
                                                    class="text-warning">{{ $user->role_id ? 'User' : $user->role_id }}</b>
                                            @endif
                                        </button>
                                    </td>
                                    <td>
                                        <a class="nav-link" data-toggle="dropdown" href="/">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="text-center mb-3"><br>
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="h5 text-success"><span><i class="fa fa-pen"></i></span>
                                                    Tahrirlash</a><br><br>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn text-danger logout" style="font-size:20px"><i
                                                            class="fa fa-trash"></i> O'chirish</button>
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
                {{ $users->links() }}
            </div>
        </div>
    </div>

</x-layouts.backend.admin>
