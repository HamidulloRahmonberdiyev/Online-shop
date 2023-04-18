<x-layouts.backend.admin>

    <x-slot:title>
        Ranglar
    </x-slot:title>

    <x-layouts.backend.header>
        Ranglar
    </x-layouts.backend.header>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ranglar</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Qidiruv">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nomi</th>
                                <th>Qoshilgan sana:</th>
                                <th>Amal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modifications as $modification)
                                <tr>
                                    <td>{{ $modification->id }}</td>
                                    <td><a href="{{ route('modifications.edit', $modification->id) }}" class="text-dark">{{ $modification->name }}</a></td>
                                    <td class="text-primary">{{ $modification->created_at }}</td>
                                    <td>
                                        <a class="nav-link" data-toggle="dropdown" href="/">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="text-center mb-3"><br>
                                                <a href="{{ route('modifications.edit', $modification->id) }}" class="h5 text-success"><span><i class="fa fa-pen"></i></span> Tahrirlash</a><br><br>
                                                <form action="{{ route('modifications.destroy', $modification->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn text-danger logout" style="font-size:20px"><i class="fa fa-trash"></i> O'chirish</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{ $modifications->links() }}
            </div>
        </div>
    </div>

</x-layouts.backend.admin>
