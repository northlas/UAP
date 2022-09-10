<header>
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container-fluid w-75">
            <div class="navbar-nav justify-content-between" style="width: 100%">
                <div class="navbar-nav">
                    <a class="navbar-brand mx-3" href="/"><img src="../storage/Assets/Icon/laravel_icon.png" width="30px"></a>
                    <a class="nav-link {{$page == 'dashboard' ? 'active border-bottom border-primary' : ''}}" href="/">Dashboard</a>
                    @auth
                        <a class="nav-link {{$page == 'cart' ? 'active border-bottom border-primary' : ''}}" href="/cart">Cart</a>
                        @can('isAdmin')
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{$page == 'admin' ? 'active border-bottom border-primary' : ''}}" href="" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                                <div class="dropdown-menu" aria-labelledby="adminDropdown">
                                    <a class="dropdown-item" href="/manage-games">Manage Games</a>
                                    <a class="dropdown-item" href="/manage-categories">Manage Categories</a>
                                </div>
                            </div>
                        @endcan
                    @endauth
                </div>
                <div class="nav-item dropdown mx-3">
                    <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @guest
                            Guest
                        @endguest
                        @auth
                            {{auth()->user()->name}}
                        @endauth
                        </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        @guest
                            <a class="dropdown-item" href="/login">Login</a>
                            <a class="dropdown-item" href="/register">Register</a>
                        @endguest
                        @auth
                            <a class="dropdown-item" href="/logout">Logout</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>