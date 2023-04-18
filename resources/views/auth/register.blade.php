<x-layouts.auth.auth>

    <x-slot:title>
        Ro'yhatdan o'tish
    </x-slot:title>

    <div class="card">
        <div class="card-body login-card-body">
          <p class="h5 login-box-msg">Ro'yhatdan o'tish</p>
    
          <form action="{{ route('register') }}" method="post" class="mb-4">
            @csrf

            <div class="input-group mb-3">
              <input type="text" name="name" class="form-control" placeholder="Ism">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="number" name="phone" class="form-control" placeholder="Telefon raqam">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
            </div>

            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Parol">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Parolni tasdiqlash">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
            </div>

            <div class="row">
              <div class="col-4" style="margin-left:66.1%">
                <button type="submit" class="btn btn-info btn-block">Yuborish</button>
              </div>
            </div>
          </form>

          <p class="mb-0">
            <a href="{{ route('login') }}" class="text-center">Siz ro'yhatdan o'tganmisiz?</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>

</x-layouts.auth.auth>