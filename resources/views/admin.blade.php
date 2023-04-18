<x-layouts.backend.admin>

    <x-slot:title>
        Asosiy
    </x-slot:title>

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $orders->count() }}</h3>

                    <p>Buyurtmalar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>  
                <a href="{{ route('orders.index') }}" class="small-box-footer">Ko'rish<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $products->count() }}<sup style="font-size: 20px"></sup></h3>

                    <p>Mahsulotlar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('products.index') }}" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $users->count() }}</h3>

                    <p>Foydalanuvchilar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('users.index')}}" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $categories->count() }}</h3>

                    <p>Kategoriyalar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-th"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">Ko'rish <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b>
                <i class="far fa-chart-bar"></i>
                Mahsulotlar sotuvi foizlarda</b>
              </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-6 col-md-3 text-center">
                  <input type="text" class="knob" value="@if($orders->count() > 0) {{ (100 / $orders->count()) * $checked_orders->count() }} @endif" data-width="100" data-height="100" data-fgColor="#3c8dbc"
                         data-readonly="true">

                  <div class="knob-label">Ko'rib chiqilgan {{ $checked_orders->count() }} ta</div>
                </div>

                <div class="col-6 col-md-3 text-center">
                  <input type="text" class="knob" value="@if($orders->count() > 0) {{ (100 / $orders->count()) * $new_orders->count() }} @endif" data-width="100" data-height="100"
                         data-fgColor="rgb(233, 186, 2)">

                  <div class="knob-label">Tekshirilmagan {{ $new_orders->count() }} ta</div>
                </div>

                <div class="col-6 col-md-3 text-center">
                  <input type="text" class="knob" data-angleArc="360" 
                         value="{{ $orders->count() }}" data-width="100" data-height="100" data-fgColor="#00a65a">
                  <div class="knob-label">Buyurtmalar</div>
                </div>

                <div class="col-6 col-md-3 text-center">
                    <input type="text" class="knob" value="{{ $products->count() }}" data-skin="tron" data-thickness="0.2"
                           data-angleArc="250" data-angleOffset="-125" data-width="120" data-height="120"
                           data-fgColor="#00c0ef">

                    <div class="knob-label">Mahsulotlar</div>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>

</x-layouts.backend.admin>
