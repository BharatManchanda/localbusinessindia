<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/assets/bootstrap-5.3.3-dist/css/bootstrap.css') }}"></link>
    <link rel="stylesheet" href="./style/client.css"></link>
    <script src="{{ asset('/assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.js') }}" ></script>
    <title>@yield('title', 'My App')</title>
</head>
<body>
    <!-- Layout Header Start -->
        <div>
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-3">
                        <div class="d-flex text-center">
                            <p class="fw-bold">Local Business<br />India</p>
                            <!-- <img src=""/> -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-center align-items-center">
                            <input type="email" class="form-control w-75 rounded-end-0" placeholder="Search for Restaurants Near by">
                            <input type="text" class="form-control w-25 rounded-start-0 rounded-end-0" placeholder="Select city">
                            <button class="btn btn-primary rounded-start-0">Search...</button>
                        </div>
                    </div>
                    <div class="col-3 d-flex justify-content-end">
                        <div>
                            <button class="btn">Free Listing</button>
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Layout Header End -->
        
    <main class="container">
        @yield('content')
    </main>

    <!-- Layout Footer Start-->
        <div>
            <div class="container">
                
            </div>
        </div>
    <!-- Layout Footer End-->
</body>
</html>
