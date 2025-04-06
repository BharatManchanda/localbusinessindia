@extends('layouts.genernal')

@section('title', 'Local Business India | Home')
@section('import.header.files')
    <link rel="stylesheet" href="{{url('/assets/css/home.css')}}">
@endsection
@section('content')
    <!-- Hero Section -->
    <section class="container hero-section">
        <div class="row align-items-center">
            <div class="col-lg-6 px-4 mb-4 mb-lg-0 text-center text-lg-start">
                <h1 class="fw-bold text-primary">Discover the best experiences to do in your city</h1>
                <p>Lorem ipsum dolor sit amet consectetur. Cursus sed congue sodales in consequat dui gravida orci.</p>
                <button class="btn btn-primary">Explore Experiences</button>
            </div>
            <div class="col-lg-6">
                <div class="row g-2">
                    <div class="col-4 mt-5">
                        <div class="card-img">
                        <img src="{{url('/assets/image/mahal.png')}}" alt="Image 1" class="img-fluid rounded">
                        <img src="{{url('/assets/image/hight.png')}}" alt="Image 2" class="img-fluid rounded mt-2">
                    </div>
                    </div>
                    <div class="col-4">
                        <img src="{{url('/assets/image/taj.png')}}" alt="Image 3" class="img-fluid h-25 rounded">
                        <img src="{{url('/assets/image/india.png')}}" alt="Image 4" class="img-fluid rounded mt-2">
                        <img src="{{url('/assets/image/amrit.png')}}" alt="Image 5" class="img-fluid rounded mt-2">
                    </div>
                    <div class="col-4 mt-5">
                        <div class="card-img">
                            <img src="{{url('/assets/image//third.png')}}" alt="Image 6" class="img-fluid rounded">
                            <img src="{{url('/assets/image/over.png')}}" alt="Image 7" class="img-fluid rounded mt-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="container my-4 my-md-5 py-3 py-md-4 bg-light rounded">
        <div class="row px-2 px-md-4">
            <!-- Daily Needs -->
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0">
                    <div class="card-body">
                        <h5 class="text-primary fw-bold mb-3 mb-md-4 text-center text-md-start">DAILY NEEDS</h5>
                        <div class="row row-cols-3 g-2 g-md-3">
                            <div class="col text-center">
                                <div class="rounded category-icon">
                                    <img src="{{url('/assets/image/Black.png')}}" alt="Grocery" class="img-fluid">
                                </div>
                                <p class="mt-2 small">Grocery</p>
                            </div>
                            <div class="col text-center">
                                <div class="rounded category-icon">
                                    <img src="{{url('/assets/image/Black (1).png')}}" alt="Stationery" class="img-fluid">
                                </div>
                                <p class="mt-2 small">Stationery</p>
                            </div>
                            <div class="col text-center">
                                <div class="rounded category-icon">
                                    <img src="{{url('/assets/image/Cleaning.png')}}" alt="Cleaning" class="img-fluid">
                                </div>
                                <p class="mt-2 small">Cleaning</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Repair & Services -->
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0">
                    <div class="card-body">
                        <h5 class="text-primary fw-bold mb-3 mb-md-4 text-center text-md-start">REPAIR & SERVICES</h5>
                        <div class="row row-cols-3 g-2 g-md-3">
                            <div class="col text-center">
                                <div class="rounded category-icon">
                                    <img src="{{url('/assets/image/Black (2).png')}}" alt="AC Services" class="img-fluid">
                                </div>
                                <p class="mt-2 small">AC Services</p>
                            </div>
                            <div class="col text-center">
                                <div class="rounded category-icon">
                                    <img src="{{url('/assets/image/Black (3).png')}}" alt="Car Services" class="img-fluid">
                                </div>
                                <p class="mt-2 small">Car Services</p>
                            </div>
                            <div class="col text-center">
                                <div class="rounded category-icon">
                                    <img src="{{url('/assets/image/img/Black (4).png')}}" alt="Phone Services" class="img-fluid">
                                </div>
                                <p class="mt-2 small">Phone Services</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wedding Requisites -->
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0">
                    <div class="card-body">
                        <h5 class="text-primary fw-bold mb-3 mb-md-4 text-center text-md-start">WEDDING REQUISITES</h5>
                        <div class="row row-cols-3 g-2 g-md-3">
                            <div class="col text-center">
                                <div class="rounded category-icon">
                                    <img src="{{url('/assets/image/Black (5).png')}}" alt="Banquet Halls" class="img-fluid">
                                </div>
                                <p class="mt-2 small">Banquet Halls</p>
                            </div>
                            <div class="col text-center">
                                <div class="rounded category-icon">
                                    <img src="{{url('/assets/image/Group 79.png')}}" alt="Bridal Requisites" class="img-fluid">
                                </div>
                                <p class="mt-2 small">Bridal Req.</p>
                            </div>
                            <div class="col text-center">
                                <div class="rounded category-icon">
                                    <img src="{{url('/assets/image/coock.png')}}" alt="Caterers" class="img-fluid">
                                </div>
                                <p class="mt-2 small">Caterers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Beauty & Spa -->
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0">
                    <div class="card-body">
                        <h5 class="text-primary fw-bold mb-3 mb-md-4 text-center text-md-start">BEAUTY & SPA</h5>
                        <div class="row row-cols-3 g-2 g-md-3">
                            <div class="col text-center">
                                <div class="rounded category-icon">
                                    <img src="{{url('/assets/image/Black (6).png')}}" alt="Beauty Parlors" class="img-fluid">
                                </div>
                                <p class="mt-2 small">Beauty Parlors</p>
                            </div>
                            <div class="col text-center">
                                <div class="rounded category-icon">
                                    <img src="{{url('/assets/image/Black (7).png')}}" alt="Spa & Massages" class="img-fluid">
                                </div>
                                <p class="mt-2 small">Spa & Massage</p>
                            </div>
                            <div class="col text-center">
                                <div class="rounded category-icon">
                                    <img src="{{url('/assets/image/Black (8).png')}}" alt="Salons" class="img-fluid">
                                </div>
                                <p class="mt-2 small">Salons</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Searches Section -->
    <section class="container my-4 my-md-5">
        <h3 class="mb-3 mb-md-4 text-center text-md-start">Popular Searches</h3>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-2 g-md-3">
            <div class="col">
                <div class="card h-100 border-1 rounded">
                    <div class="text-center pt-3">
                        <img src="{{url('/assets/image/hotel.png')}}" alt="Hotels" class="search-image">
                    </div>
                    <a href="#" class="search-btn mt-auto d-flex justify-content-between p-2">
                        <span>Hotels</span> <span>&rarr;</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-1 rounded">
                    <div class="text-center pt-3">
                        <img src="{{url('/assets/image/real-estate.png')}}" alt="Real Estate" class="search-image">
                    </div>
                    <a href="#" class="search-btn mt-auto d-flex justify-content-between p-2">
                        <span>Real Estate</span> <span>&rarr;</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-1 rounded">
                    <div class="text-center pt-3">
                        <img src="{{url('/assets/image/gym.png')}}" alt="Gym" class="search-image">
                    </div>
                    <a href="#" class="search-btn mt-auto d-flex justify-content-between p-2">
                        <span>Gym</span> <span>&rarr;</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-1 rounded">
                    <div class="text-center pt-3">
                        <img src="{{url('/assets/image/hostel.png')}}" alt="PG/Hostels" class="search-image">
                    </div>
                    <a href="#" class="search-btn mt-auto d-flex justify-content-between p-2">
                        <span>PG/Hostels</span> <span>&rarr;</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-1 rounded">
                    <div class="text-center pt-3">
                        <img src="{{url('/assets/image/restaurant.png')}}" alt="Restaurants" class="search-image">
                    </div>
                    <a href="#" class="search-btn mt-auto d-flex justify-content-between p-2">
                        <span>Restaurants</span> <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Cities Section -->
    <section class="container my-4 my-md-5">
        <h3 class="mb-3 mb-md-4 text-center text-md-start">Top Cities</h3>
        <div class="row row-cols-2 row-cols-md-4 g-3">
            <div class="col">
                <div class="card city-card h-100">
                    <img src="{{url('/assets/image/amrit.png')}}" alt="Delhi" class="card-img-top">
                    <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                        <span>Delhi</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card city-card h-100">
                    <img src="{{url('/assets/image/amrit.png')}}" alt="Agra" class="card-img-top">
                    <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                        <span>Agra</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card city-card h-100">
                    <img src="{{url('/assets/image/amrit.png')}}" alt="Jaipur" class="card-img-top">
                    <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                        <span>Jaipur</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card city-card h-100">
                    <img src="{{url('/assets/image/amrit.png')}}" alt="Mumbai" class="card-img-top">
                    <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                        <span>Mumbai</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
