<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#2C6E49;"> 
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" style="font-size: 1.3rem; font-weight: bold; color: #ecf0f1;">Restaurant</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}" style="font-size: 1rem; color: #ecf0f1; font-weight: 500;" 
   onmouseover="this.style.color='#A5D6A7'" onmouseout="this.style.color='#ecf0f1'">
   Home
</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#about-us" style="font-size: 1rem; color: #ecf0f1; font-weight: 500;">About Us</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#menu" style="font-size: 1rem; color: #ecf0f1; font-weight: 500;">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#our-products" style="font-size: 1rem; color: #ecf0f1; font-weight: 500;">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#gallery" style="font-size: 1rem; color: #ecf0f1; font-weight: 500;">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#booking" style="font-size: 1rem; color: #ecf0f1; font-weight: 500;">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dash')}}" style="font-size: 1rem; color: #ecf0f1; font-weight: 500;">Admin Dashboard</a>
                    </li>
                </ul>

                <!-- User authentication links on the right -->
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <!-- User Dropdown when logged in -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1rem; color: #ecf0f1;">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <!-- Login and Register Dropdown when not logged in -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="authDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1rem; color: #ecf0f1;">
                                    Login / Register
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="authDropdown">
                                    <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                    @if (Route::has('register'))
                                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
