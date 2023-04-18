<x-layouts.backend.admin>

    <x-slot:title>
        Buyurtmalar
    </x-slot:title>

    <x-layouts.backend.header>
        Buyurtmalar 
    </x-layouts.backend.header>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Projects</h3>
        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <table class="table table-striped projects">
                      <thead>
                          <tr>
                              <th style="width: 1%">
                                  ID
                              </th>
                              <th style="width: 20%">
                                   Ism
                              </th>
                              <th style="width: 20%">
                                   Telefon raqam
                              </th>
                              <th style="width: 25%">
                                  Mahsulot
                              </th>
                              <th style="width: 18%">
                                Buyurtma vaqti
                            </th>
                              <th style="width: 8%" class="text-center">
                                  Status
                              </th>
                              <th class="text-right" style="width: 10%">
                                Amal
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $order)                          
                          <tr>
                              <td>
                                  {{ $order->id }}
                              </td>
                              <td>
                                  <a>
                                    <b>{{ $order->user->name }}</b>
                                  </a>
                                  <br/>
                              </td>
                              <td class="text-primary">
                                    {{ $order->user->phone }}
                              </td>
                              <td>
                                    {{ $order->product->name }}
                              </td>
                              <td>
                                    <em>{{ $order->created_at }}</em>
                              </td>
                              <td class="project-state">
                                @if ( $order->status == 0)
                                    <span class="badge badge-success">Yangi</span>
                                @else
                                <span class="badge badge-warning">Tekshirilgan</span>
                                @endif
                              </td>
                              <td class="project-actions text-right">
                                <a class="nav-link" data-toggle="dropdown" href="/">
                                    <i class="fa fa-ellipsis-v"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                      <div class=""><br>
                                              <a class="btn btn-primary btn-sm" href="{{ route('orders.show', $order->id) }}" style="margin-left:15%">
                                                  <i class="fas fa-folder">
                                                  </i>
                                                  Ko'rish
                                              </a>
                                              <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                  @method('DELETE')
                                                  @csrf
                                                  <button class="btn btn-danger btn-sm" style="margin-left:55%;margin-top:-21%"><i class="fas fa-trash"></i> O'chirish</button>
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
                {{ $orders->links() }}
            </div>
        </div>
    </div>

</x-layouts.backend.admin>
