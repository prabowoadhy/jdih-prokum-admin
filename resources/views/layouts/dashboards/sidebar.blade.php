<nav class="main-sidebar ps-menu">
    <div class="sidebar-toggle action-toggle">
        <a href="#">
            <i class="fas fa-bars"></i>
        </a>
    </div>
    <div class="sidebar-opener action-toggle">
        <a href="#">
            <i class="ti-angle-right"></i>
        </a>
    </div>
    <div class="sidebar-header">
        <div class="text">
        <img src="{{ asset('assets/images/logo_magetan.png') }}" class="img img-fluid center" width="100vh">
        </div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="{{ request()->segment(1) == 'dashboard' && request()->segment(2) == '' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="link">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->segment(1) == 'prokum' && request()->segment(2) == '' ? 'active' : '' }}">
                <a href="{{ route('prokum-admin') }}" class="link">
                    <i class="fas fa-university"></i>
                    <span>Produk Hukum</span>
                </a>
            </li>
            <li class="{{ request()->segment(1) == 'kategori' && request()->segment(2) == '' ? 'active' : '' }}">
                <a href="{{ route('kategori-admin') }}" class="link">
                    <i class="fas fa-gavel"></i>
                    <span>Kategori</span>
                </a>
            </li>
            @can('read user')
            <li class="{{ request()->segment(1) == 'dashboard' && request()->segment(2) == 'konfigurasi' ? 'active open' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-desktop"></i>
                    <span>Manajemen User</span>
                </a>
                <ul class="sub-menu {{ request()->segment(1) == 'dashboard' && request()->segment(2) == 'konfigurasi' ? 'expand' : '' }}">
                    @can('read role')
                    <li class="{{ request()->segment(3) == 'roles' ? ' active' : '' }}"><a href="{{ route('roles.index') }}" class="link"><span>Roles</span></a></li>
                    @endcan
                
                    @can('read user')
                    <li class="{{ request()->segment(3) == 'user' ? ' active' : '' }}"><a href="{{ route('user.index') }}" class="link"><span>User</span></a></li>
                    @endcan
                </ul>
            </li>
            @endcan
        </ul>
    </div>
</nav>  