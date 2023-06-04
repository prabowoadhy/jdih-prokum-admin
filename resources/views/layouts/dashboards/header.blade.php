<header class="header-navbar fixed">
    <div class="toggle-mobile action-toggle"><i class="fas fa-bars"></i></div>
    <div class="header-wrapper">
        <div class="header-left">
            <div class="theme-switch-icon"></div><div class="text" style="color: #fff;">&nbsp; JDIH Admin Panel</div>
        </div>
        <div class="header-content">
            <div class="dropdown dropdown-menu-end">
                <a href="#" class="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="label">
                        <span></span>
                        <div>{{ Auth::user()->name }}</div>
                    </div>
                    <img class="img-user" src="{{ asset('assets/images/avatar1.png') }}" alt="user"srcset="">
                </a>
                <ul class="dropdown-menu small">
                    <!-- <li class="menu-header">
                        <a class="dropdown-item" href="#">Notifikasi</a>
                    </li> -->
                    <li class="menu-content ps-menu">
                        <a href="{{ route('edit.user', [ 'id' => Auth::user()->id]) }}">
                            <div class="description">
                                <i class="ti-user"></i> Profile
                            </div>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">
                                <div class="description">
                                    <i class="ti-power-off"></i> Logout
                                </div>
                            </button>
                        </form>                        
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>