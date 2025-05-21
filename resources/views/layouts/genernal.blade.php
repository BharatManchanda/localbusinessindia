<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/assets/bootstrap-5.3.3-dist/css/bootstrap.css') }}"></link>
    <script src="{{ asset('/assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.js') }}" ></script>
    @yield('import.header.files')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>@yield('title', 'My App')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-2 py-lg-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{route('landing.home')}}">Local <span class="text-primary">Business</span> India</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <div
                    class="d-flex flex-column flex-lg-row align-items-start justify-content-between align-items-lg-center ms-auto mb-2 mb-lg-0 w-100 w-lg-auto">
                    <div class="d-flex flex-column flex-md-row w-50 mb-2 mb-lg-0 navbar-form">
                        <input class="form-control me-md-2 mb-2 mb-md-0" type="search" placeholder="Search here">
                        <input class="form-control me-md-2 mb-2 mb-md-0" type="text" value="Mumbai">
                        <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="ms-lg-3 mt-2 mt-lg-0 d-flex">
                        <a href="{{route('landing.business.add')}}" class="text-primary me-3 mb-2 mb-lg-0">Free Listing</a>
                        <button class="btn btn-primary">Login/Sign up</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
        
    <main class="container">
        @yield('content')
    </main>

    <footer class="bg-light py-3 border-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 mb-md-0 text-center text-md-start">
                    <a class="navbar-brand" href="#">
                        <img src="/api/placeholder/120/40" alt="Local Business India Logo">
                    </a>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="d-flex justify-content-center flex-wrap">
                        <a href="#" class="text-secondary me-3 mb-2 text-decoration-none">Home</a>
                        <a href="#" class="text-secondary me-3 mb-2 text-decoration-none">About Us</a>
                        <a href="#" class="text-secondary me-3 mb-2 text-decoration-none">Contact Us</a>
                        <a href="#" class="text-secondary text-decoration-none">Privacy Policy</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-center justify-content-md-end align-items-center">
                        <span class="me-3 text-secondary">Follow Us:</span>
                        <a href="#" class="text-secondary me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-secondary me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-secondary"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
