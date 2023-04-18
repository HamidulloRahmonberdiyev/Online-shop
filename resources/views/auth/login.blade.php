<x-layouts.auth.auth>

    <x-slot:title>
        Kirish
    </x-slot:title>

    <div class="card">
        <div class="card-body login-card-body">
          <p class="h5 login-box-msg">Kirish</p>
    
          <form action="{{ route('login') }}" method="post" class="mb-4">
            @csrf

            <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
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

            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Eslab qol
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-info btn-block">Yuborish</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
          <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">Siz ro'yhatdan o'tmaganmisiz?</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>

</x-layouts.auth.auth>