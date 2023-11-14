<aside class="main-sidebar elevation-4 sidebar-light-danger">

    <a href="index3.html" class="brand-link bg-danger">
        <img src="{{ asset('AdminLTE') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{--  <li class="nav-header">EXAMPLES</li>  --}}

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link {{ request()->is('category*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>
                            Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Post
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Service
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->is('admin/subscriber*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Subscriber
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>
                            About
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->is('admin/contact*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Kontak Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-header">SISTEM</li>
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}"
                        class="nav-link {{ request()->is('setting*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"
                        onclick="document.querySelector('#form-logout').submit()">
                        <i class="nav-icon fas fa-sign-in-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form action="{{ route('logout') }}" method="post" id="form-logout">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>

    </div>

</aside>
