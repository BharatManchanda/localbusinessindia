@include("landing.business.constant.index")
@extends('layouts.genernal')
@section('title', 'Business List | Local Business India')
@section('import.header.files')
    <link rel="stylesheet" href="{{url('/assets/css/businesslist.css')}}">
    <style>
        /* Minimal custom styles that can't be achieved with Bootstrap alone */
    </style>
@endsection
@section('content')
		<!-- Search Bar -->
    <div class="container mb-4 mt-4">
        <div class="row g-2">
            <div class="col-md-2 col-6">
                <select class="form-select">
                    <option>Balongi, Kharar</option>
                </select>
            </div>
            <div class="col-md">
                <input type="text" class="form-control bg-light" placeholder="Enter product/service to search">
            </div>
            <div class="col-md-1 col-6">
                <button class="btn btn-warning w-100">Search</button>
            </div>
            <div class="col-md-2 col-6">
                <select class="form-select">
                    <option>Sort by</option>
                </select>
            </div>
            <div class="col-md-2 col-6">
                <select class="form-select">
                    <option>Properties Served</option>
                </select>
            </div>
            <div class="col-md-2 col-6">
                <button class="btn btn-outline-dark w-100">✔ Verified</button>
            </div>
            <div class="col-md-2 col-6">
                <button class="btn btn-outline-dark w-100">All Filters</button>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-8" id="business-list">
                <!-- Dynamic listing of business -->
            </div>
            
            <!-- Inquiry Sidebar -->
            <div class="col-lg-4">
                <!-- Inquiry Box 1 -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Get the List of Top Electricians</h6>
                        <p class="card-text small">We'll send you contact details in seconds for free</p>
                        <label class="form-label">What type of Electrician services are you looking for?</label>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="service" id="wiring">
                                <label class="form-check-label" for="wiring">Wiring</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="service" id="installation">
                                <label class="form-check-label" for="installation">Installation</label>
                            </div>
                        </div>
                        <input type="text" class="form-control mb-2" placeholder="Name">
                        <input type="text" class="form-control mb-2" placeholder="Mobile Number">
                        <button class="btn btn-warning w-100">Send Enquiry >></button>
                    </div>
                </div>
                
                <!-- Inquiry Box 2 -->
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Free quotes from local professionals</h6>
                        <p class="card-text small">Tell us about your project and get help from sponsored business.</p>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="needType" id="whatNeed">
                                <label class="form-check-label" for="whatNeed">What do you need?</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="needType" id="enterZip">
                                <label class="form-check-label" for="enterZip">Enter zip code</label>
                            </div>
                        </div>
                        <input type="text" class="form-control mb-2" placeholder="Name">
                        <input type="text" class="form-control mb-2" placeholder="Mobile Number">
                        <button class="btn btn-warning w-100">Send Enquiry >></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Emergency Call -->
    <div class="bg-orange text-white py-4 mb-n4 position-relative">
        <div class="container d-flex flex-wrap justify-content-between align-items-center">
            <div>
                <h5 class="fw-bold mb-1">24/7 Emergency Call: 1800 654 5789</h5>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <button class="btn btn-dark mt-2 mt-md-0">📧 Subscribe now</button>
        </div>
    </div>
    @include("landing.business.constant.index")
    <script>
        list.fetch();
    </script>
@endsection