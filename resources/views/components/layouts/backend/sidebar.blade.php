<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dark NET</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('users.index') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Qidiruv"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('orders.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Buyurtmalar
                            <span class="right badge badge-primary">Yangi</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('admin/categories') ? 'menu-open' : '' }}">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Kategoriyalar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <p>Kategoriyalar ro'yhati</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link">
                                <p>Yangi Kategoriya</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::is('admin/products') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Mahsulotlar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link">
                                <p>Mahsulotlar ro'yhati</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.create') }}" class="nav-link">
                                <p>Yangi Mahsulot</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ Request::is('admin/modifications') ? 'menu-open' : '' }}">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-tint"></i>
                        <p>
                            Ranglar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('modifications.index') }}" class="nav-link">
                                <p>Ranglar ro'yhati</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('modifications.create') }}" class="nav-link">
                                <p>Yangi Rang</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (Auth::user()->role_id > 2)
                    <li class="nav-header">Qo'shimcha</li>

                    <li class="nav-item {{ Request::is('admin/users') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-user text-success"></i>
                            <p>
                                Foydalanuvchilar
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <p>Foydalanuvchilar ro'yhati</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users.create') }}" class="nav-link">
                                    <p>Yangi foydalanuvchi</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ Request::is('admin/roles') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p>
                                Role
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link">
                                    <p>Roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('roles.create') }}" class="nav-link">
                                    <p>Create role</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
