<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TBCare')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- HEADER / NAVBAR -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">TBCare</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/tentang') }}">BelajarTBC</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/edukasi') }}">MonitorTBC</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/layanan') }}">CariKlinik</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About Us</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-light text-primary ms-2" href="{{ url('/login') }}">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="container my-5">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row text-center text-md-start">
                
                <!-- Company -->
                <div class="col-md-6 mb-4">
                    <h5 class="fw-bold mb-3 text-uppercase">Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/about') }}" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="{{ url('/tentang') }}" class="text-white text-decoration-none">BelajarTBC</a></li>
                        <li><a href="{{ url('/layanan') }}" class="text-white text-decoration-none">CariKlinik</a></li>
                    </ul>
                </div>

                <!-- Contact Us -->
                <div class="col-md-6 mb-4">
                    <h5 class="fw-bold mb-3 text-uppercase">Contact Us</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            📞 0812-1321-212
                        </li>
                        <li>
                            ✉️ greenbox@gmail.com
                        </li>
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

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
