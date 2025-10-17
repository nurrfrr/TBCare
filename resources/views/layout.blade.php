<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TBCare')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">TBCare</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <!-- LEFT MENU -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/belajar') }}">BelajarTBC</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/monitor') }}">MonitorTBC</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/map') }}">CariKlinik</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About Us</a></li>
                </ul>

                <!-- RIGHT SIDE AUTH AREA -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link btn btn-light text-primary px-3" href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" class="rounded-circle" width="28" height="28">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item text-danger" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="container my-5">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-6 mb-4">
                    <h5 class="fw-bold mb-3 text-uppercase">Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/about') }}" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="{{ url('/tentang') }}" class="text-white text-decoration-none">BelajarTBC</a></li>
                        <li><a href="{{ url('/layanan') }}" class="text-white text-decoration-none">CariKlinik</a></li>
                    </ul>
                </div>
                <div class="col-md-6 mb-4">
                    <h5 class="fw-bold mb-3 text-uppercase">Contact Us</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">📞 0812-1321-212</li>
                        <li>✉️ greenbox@gmail.com</li>
                    </ul>
                </div>
            </div>
            <hr class="border-light">
            <div class="text-center">
                <p class="mb-1">© 2025 Website TBC. All rights reserved.</p>
                <small>Bersama kita bisa wujudkan Indonesia bebas TBC.</small>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
