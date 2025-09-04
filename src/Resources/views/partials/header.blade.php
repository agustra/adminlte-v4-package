<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>
        <!--end::Start Navbar Links-->

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Dark Mode Toggle-->
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="theme">
                    <i data-lte-icon="dark" class="bi bi-moon-fill"></i>
                    <i data-lte-icon="light" class="bi bi-sun-fill" style="display: none"></i>
                </a>
            </li>
            <!--end::Dark Mode Toggle-->
            
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>
            <!--end::Fullscreen Toggle-->
            
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    @auth
                        <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name ?? 'User').'&background=007bff&color=fff' }}" class="user-image rounded-circle shadow" alt="User Image">
                        <span class="d-none d-md-inline">{{ auth()->user()->name ?? 'User' }}</span>
                    @else
                        <img src="https://ui-avatars.com/api/?name=Guest&background=6c757d&color=fff" class="user-image rounded-circle shadow" alt="Guest">
                        <span class="d-none d-md-inline">Guest User</span>
                    @endauth
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        @auth
                            <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name ?? 'User').'&background=007bff&color=fff' }}" class="rounded-circle shadow" alt="User Image">
                            <p>
                                {{ auth()->user()->name ?? 'User' }} - {{ auth()->user()->email ?? 'No Email' }}
                                <small>Member since {{ auth()->user()->created_at ? auth()->user()->created_at->format('M Y') : 'Unknown' }}</small>
                            </p>
                        @else
                            <img src="https://ui-avatars.com/api/?name=Guest&background=6c757d&color=fff" class="rounded-circle shadow" alt="Guest">
                            <p>
                                Guest User
                                <small>Not authenticated</small>
                            </p>
                        @endauth
                    </li>
                    <!--end::User Image-->
                    <!--begin::Menu Body-->
                    <li class="user-body">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-4 text-center"><a href="#">Followers</a></div>
                            <div class="col-4 text-center"><a href="#">Sales</a></div>
                            <div class="col-4 text-center"><a href="#">Friends</a></div>
                        </div>
                        <!--end::Row-->
                    </li>
                    <!--end::Menu Body-->
                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        @if(Route::has('profile.show') || Route::has('profile'))
                            <a href="{{ Route::has('profile.show') ? route('profile.show') : route('profile') }}" class="btn btn-default btn-flat">Profile</a>
                        @else
                            @if(class_exists('AgusUsk\AdminLteAuth\Providers\AuthServiceProvider'))
                                <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
                            @else
                                <a href="#" class="btn btn-default btn-flat" onclick="alert('Profile page not available')">Profile</a>
                            @endif
                        @endif
                        @auth
                            @if(Route::has('logout'))
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat float-end">Sign out</button>
                                </form>
                            @else
                                <a href="#" class="btn btn-default btn-flat float-end" onclick="alert('Logout route not available')">Sign out</a>
                            @endif
                        @else
                            <a href="{{ Route::has('login') ? route('login') : '#' }}" class="btn btn-default btn-flat float-end">Sign in</a>
                        @endauth
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
<!--end::Header-->