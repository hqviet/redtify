@php
$routes = [
    [
        'title' => 'Dashboard',
        'uri' => route('home'),
        'icon' => 'fa-tachometer-alt'
    ],
    [
        'title' => 'User',
        'uri' => route('user'),
        'icon' => 'fa-user-alt'
    ],
];
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="Redtify Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Redtify</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @forelse ($routes as $route)
                <li class="nav-item">
                    <a href="{{ $route['uri'] }}" class="nav-link {{ $route['uri'] == Request::url() ? 'active' : '' }}">
                        <i class="nav-icon fas {{ $route['icon'] }}"></i>
                        <p>
                            {{ $route['title'] }}
                        </p>
                    </a>
                </li>
               @empty
                   
               @endforelse
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>