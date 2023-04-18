<x-layouts.backend.admin>

    <x-slot:title>
        Buyurtmalar / {{ $order->user->name }}
    </x-slot:title>

    <x-layouts.backend.header>
        Buyurtmalar / {{ $order->user->name }}
    </x-layouts.backend.header>


    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('backend') }}/dist/img/user.png"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $order->user->name }}</h3><br>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Telefon raqam:</b> <a class="float-right">{{ $order->user->phone }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email:</b> <a class="float-right">{{ $order->user->email }}</a>
                        </li>
                    </ul>
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-block"><b>Ko'rish</b></a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        @if ($order->status == '0')
                            <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-success"><i class="fas fa-check"></i> Tekshirildi</button>
                            </form>
                        @endif
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger ml-2"><i class="fas fa-trash"></i> O'chirish</button>
                        </form>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">

                            <!-- Post -->
                            <div class="post">
                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i><b>
                                            {{ $order->created_at }}</b></span>

                                    <h3 class="timeline-header mb-3"><a
                                            href="{{ route('products.show', $order->product->id) }}">{{ $order->product->name }}</a>
                                    </h3>

                                    <div>
                                        @if (isset($order->modification))
                                        <label class="btn btn-default text-center active">
                                            {{ $order->modification->name }}
                                        </label>
                                        @endif
                                    </div><br>

                                    <div class="timeline-body">
                                        {{ $order->product->content }}
                                    </div><br>
                                </div>
                                <!-- /.user-block -->
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                @foreach ($images as $image)
                                                    <img class="col-3 mb-3"
                                                        src="{{ asset('storage/' . $image->image) }}" alt="Photo">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-5" style="background:rgba(0, 0, 0, 0.046)">
                                    <h5 class="mt-2"><b>Jami soni:</b> {{ $order->quantity }} ta</h5>
                                    <h5 class="mt-2"><b>Jami summa:</b> {{ number_format($order->quantity * $order->product->price, 0, '') }} so'm</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.backend.admin>
