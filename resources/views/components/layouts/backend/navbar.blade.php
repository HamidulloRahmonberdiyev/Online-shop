<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="/" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form action="{{ route('search.products') }}" method="GET" class="form-inline">
            @csrf
            <div class="input-group input-group-sm">
              <input name="search" class="form-control form-control-navbar" type="search" placeholder="Mahsulot nomini yozing" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="/admin">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Buyurtmalar</span>
          <div class="dropdown-divider"></div>
          <a href="/admin" class="dropdown-item">
            <i class="fa fa-shopping-cart mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

       <!-- User Dropdown Menu -->
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img src="{{ asset('backend') }}/dist/img/user.png" alt="User Avatar" class="img-circle" style="width:30px">
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="/" class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title text-primary mb-2">{{ Auth::user()->name }}</h3>
                <h3 class="dropdown-item-title text-primary mb-2">{{ Auth::user()->email }}</h3>
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                    <button class="btn btn-light mr-2 logout text-danger"> <i class="fa fa-power-off mr-1"></i> Chiqish</button>
                </form>
              </div>
            </div>
          </a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>