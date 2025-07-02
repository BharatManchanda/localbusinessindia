@include("landing.business.constant.index")
@extends('layouts.genernal')

@section('title', 'Business Create | Local Business India')
@section('import.header.files')
    <link rel="stylesheet" href="{{url('/assets/css/businessadd.css')}}">
@endsection
@section('content')
    <div class="container-fluid p-3">
        <div class="row g-3">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="main-container p-4">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center mb-2">
                                <h4 class="mb-0 me-2">{{ $business->name }}</h4>
                                <i class="fas fa-check-circle text-success"></i>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-success me-2" style="font-size: 11px;">4.0</span>
                                <div class="rating-stars me-2">★★★★☆</div>
                                <span class="text-muted" style="font-size: 12px;">(1k)</span>
                            </div>
                            <p class="text-muted mb-2" style="font-size: 13px;">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                {{ $business->business_address }} {{ $business->city }}
                            </p>
                            <div class="d-flex gap-2">
                                <button class="btn btn-whatsapp btn-sm px-3">
                                    <i class="fab fa-whatsapp me-1"></i> {{ $business->phone }}
                                </button>
                                <button class="btn btn-orange btn-sm px-3">Send Enquiry</button>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="rating-stars me-3" style="font-size: 18px;">☆☆☆☆☆</div>
                            <button class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Navigation Tabs -->
                    <ul class="nav nav-tabs mb-4" id="mainTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab">Photos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="quickinfo-tab" data-bs-toggle="tab" data-bs-target="#quickinfo" type="button" role="tab">Quick Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">Reviews</button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="mainTabContent">
                        
                        <!-- Overview Tab -->
                        <div class="tab-pane fade" id="overview" role="tabpanel">
                            <h5 class="mb-3">Business Overview</h5>
                            <p class="mb-3">Annanya Electrical is a trusted electrical service provider with over 7 years of experience in the industry. We specialize in residential and commercial electrical solutions, offering 24/7 emergency services to our valued customers.</p>
                            
                            <h6 class="mb-2">Our Services</h6>
                            <ul class="list-unstyled mb-3">
                                <li class="mb-1"><i class="fas fa-check text-success me-2"></i> Electrical Wiring & Rewiring</li>
                                <li class="mb-1"><i class="fas fa-check text-success me-2"></i> Ceiling Fan Installation</li>
                                <li class="mb-1"><i class="fas fa-check text-success me-2"></i> Switch & Socket Installation</li>
                                <li class="mb-1"><i class="fas fa-check text-success me-2"></i> Light Fixture Installation</li>
                                <li class="mb-1"><i class="fas fa-check text-success me-2"></i> Electrical Panel Upgrades</li>
                                <li class="mb-1"><i class="fas fa-check text-success me-2"></i> Emergency Electrical Repairs</li>
                            </ul>

                            <h6 class="mb-2">Why Choose Us?</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-1"><i class="fas fa-star text-warning me-2"></i> Licensed & Insured</li>
                                        <li class="mb-1"><i class="fas fa-star text-warning me-2"></i> 24/7 Emergency Service</li>
                                        <li class="mb-1"><i class="fas fa-star text-warning me-2"></i> Competitive Pricing</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-1"><i class="fas fa-star text-warning me-2"></i> Quality Workmanship</li>
                                        <li class="mb-1"><i class="fas fa-star text-warning me-2"></i> Free Estimates</li>
                                        <li class="mb-1"><i class="fas fa-star text-warning me-2"></i> Customer Satisfaction</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Photos Tab -->
                        <div class="tab-pane fade show active" id="photos" role="tabpanel">
                            <div class="photos-section">
                                <h5 class="mb-3">Photos</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="photo-container">
                                            <img src="https://images.unsplash.com/photo-1621905251918-48416bd8575a?w=300&h=200&fit=crop" 
                                                 class="img-fluid w-100" alt="Electrician work" style="height: 180px; object-fit: cover;">
                                            <span class="photo-label">All</span>
                                        </div>
                                        <p class="text-center mt-2 mb-0" style="font-size: 13px;">All Photos / videos</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="photo-container">
                                            <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?w=300&h=200&fit=crop" 
                                                 class="img-fluid w-100" alt="Electrical work" style="height: 180px; object-fit: cover;">
                                            <i class="fas fa-play-circle play-icon"></i>
                                            <span class="photo-label">Video</span>
                                        </div>
                                        <p class="text-center mt-2 mb-0" style="font-size: 13px;">Video</p>
                                    </div>
                                </div>
                                
                                <!-- More Photos -->
                                <div class="row g-3 mt-2">
                                    <div class="col-md-4">
                                        <div class="photo-container">
                                            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=200&h=150&fit=crop" 
                                                 class="img-fluid w-100" alt="Electrical panel" style="height: 120px; object-fit: cover;">
                                        </div>
                                        <p class="text-center mt-1 mb-0" style="font-size: 12px;">Electrical Panel</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="photo-container">
                                            <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?w=200&h=150&fit=crop" 
                                                 class="img-fluid w-100" alt="Wiring work" style="height: 120px; object-fit: cover;">
                                        </div>
                                        <p class="text-center mt-1 mb-0" style="font-size: 12px;">Wiring Work</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="photo-container">
                                            <img src="https://images.unsplash.com/photo-1621905251918-48416bd8575a?w=200&h=150&fit=crop" 
                                                 class="img-fluid w-100" alt="Installation" style="height: 120px; object-fit: cover;">
                                        </div>
                                        <p class="text-center mt-1 mb-0" style="font-size: 12px;">Installation</p>
                                    </div>
                                </div>
                                
                                <button class="btn btn-orange btn-sm mt-3">
                                    <i class="fas fa-plus me-1"></i> Upload Photo
                                </button>
                            </div>
                        </div>

                        <!-- Quick Info Tab -->
                        <div class="tab-pane fade" id="quickinfo" role="tabpanel">
                            <h5 class="mb-3">Quick Information</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <strong style="font-size: 14px;">Year of Establishment</strong>
                                        <p class="mb-0 text-muted">2018</p>
                                    </div>
                                    <div class="mb-3">
                                        <strong style="font-size: 14px;">Business Type</strong>
                                        <p class="mb-0 text-muted">Electrical Services</p>
                                    </div>
                                    <div class="mb-3">
                                        <strong style="font-size: 14px;">Working Hours</strong>
                                        <p class="mb-0 text-muted">24/7 Available</p>
                                    </div>
                                    <div class="mb-3">
                                        <strong style="font-size: 14px;">Service Areas</strong>
                                        <p class="mb-0 text-muted">Mehal Sector, ST Mehal, and surrounding areas</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <strong style="font-size: 14px;">Specialization</strong>
                                        <p class="mb-0 text-muted">Residential & Commercial Electrical Work</p>
                                    </div>
                                    <div class="mb-3">
                                        <strong style="font-size: 14px;">License Status</strong>
                                        <p class="mb-0 text-muted">Licensed & Certified</p>
                                    </div>
                                    <div class="mb-3">
                                        <strong style="font-size: 14px;">Payment Methods</strong>
                                        <p class="mb-0 text-muted">Cash, Card, UPI, Bank Transfer</p>
                                    </div>
                                    <div class="mb-3">
                                        <strong style="font-size: 14px;">Emergency Service</strong>
                                        <p class="mb-0 text-muted">Available 24/7</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Tab -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <!-- Reviews Summary -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h5>Total Reviews</h5>
                                    <h3 class="text-primary">5K+ <small class="text-muted fs-6">reviews</small></h3>
                                </div>
                                <div class="col-md-6">
                                    <h5>Average Reviews</h5>
                                    <div class="d-flex align-items-center">
                                        <h3 class="me-2">4.0</h3>
                                        <div class="rating-stars">★★★★☆</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Rating Breakdown -->
                            <div class="mb-4">
                                <h5 class="mb-3">Customer Feedbacks</h5>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-2 d-flex align-items-center">
                                            <span class="me-2">5</span>
                                            <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                                <div class="progress-bar bg-success" style="width: 80%"></div>
                                            </div>
                                            <span class="small text-muted">80%</span>
                                        </div>
                                        <div class="mb-2 d-flex align-items-center">
                                            <span class="me-2">4</span>
                                            <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                                <div class="progress-bar bg-primary" style="width: 60%"></div>
                                            </div>
                                            <span class="small text-muted">60%</span>
                                        </div>
                                        <div class="mb-2 d-flex align-items-center">
                                            <span class="me-2">3</span>
                                            <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                                <div class="progress-bar bg-info" style="width: 40%"></div>
                                            </div>
                                            <span class="small text-muted">40%</span>
                                        </div>
                                        <div class="mb-2 d-flex align-items-center">
                                            <span class="me-2">2</span>
                                            <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                                <div class="progress-bar bg-warning" style="width: 20%"></div>
                                            </div>
                                            <span class="small text-muted">20%</span>
                                        </div>
                                        <div class="mb-2 d-flex align-items-center">
                                            <span class="me-2">1</span>
                                            <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                                <div class="progress-bar bg-danger" style="width: 10%"></div>
                                            </div>
                                            <span class="small text-muted">10%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <button class="btn btn-orange btn-sm mb-2">
                                            All Ratings <i class="fas fa-chevron-down"></i>
                                        </button>
                                        <br>
                                        <button class="btn btn-orange btn-sm">
                                            Latest Ratings <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Individual Reviews -->
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                                    R
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Rajesh Kumar</h6>
                                                    <div class="rating-stars">★★★★★</div>
                                                </div>
                                            </div>
                                            <p class="small text-muted mb-2">Excellent electrical service! They fixed my wiring issues quickly and professionally. Very satisfied with their work quality and pricing.</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">2 days ago</small>
                                                <div>
                                                    <button class="btn btn-sm btn-outline-secondary me-1">👍 5</button>
                                                    <button class="btn btn-sm btn-outline-secondary">👎 0</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                                    P
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Priya Sharma</h6>
                                                    <div class="rating-stars">★★★★☆</div>
                                                </div>
                                            </div>
                                            <p class="small text-muted mb-2">Good service for ceiling fan installation. Came on time and completed the work efficiently. Reasonable pricing.</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">5 days ago</small>
                                                <div>
                                                    <button class="btn btn-sm btn-outline-secondary me-1">👍 3</button>
                                                    <button class="btn btn-sm btn-outline-secondary">👎 1</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                                    A
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Amit Singh</h6>
                                                    <div class="rating-stars">★★★★★</div>
                                                </div>
                                            </div>
                                            <p class="small text-muted mb-2">Amazing electrical services! They provided 24/7 emergency service when needed. Highly recommended for any electrical work.</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">1 week ago</small>
                                                <div>
                                                    <button class="btn btn-sm btn-outline-secondary me-1">👍 8</button>
                                                    <button class="btn btn-sm btn-outline-secondary">👎 0</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="rounded-circle bg-info text-white d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                                    S
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Sunita Devi</h6>
                                                    <div class="rating-stars">★★★★☆</div>
                                                </div>
                                            </div>
                                            <p class="small text-muted mb-2">Professional service for home wiring. The team was courteous and completed the job without any mess. Fair pricing.</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">2 weeks ago</small>
                                                <div>
                                                    <button class="btn btn-sm btn-outline-secondary me-1">👍 4</button>
                                                    <button class="btn btn-sm btn-outline-secondary">👎 2</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    <!-- Question & Answers -->
                    <div class="mb-4">
                        <h5 class="mb-2">Question & Answers</h5>
                        <p class="text-muted mb-3" style="font-size: 13px;">Would you like to ask a question?</p>
                        
                        <!-- Existing Questions -->
                        <div class="mb-3">
                            <div class="card mb-2">
                                <div class="card-body p-3">
                                    <strong style="font-size: 14px;">Q: Do you provide emergency electrical services?</strong>
                                    <p class="mb-0 mt-2 text-muted" style="font-size: 13px;">A: Yes, we provide 24/7 emergency electrical services. You can call us anytime for urgent electrical issues.</p>
                                    <small class="text-muted">Asked 3 days ago</small>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-body p-3">
                                    <strong style="font-size: 14px;">Q: What are your service charges?</strong>
                                    <p class="mb-0 mt-2 text-muted" style="font-size: 13px;">A: Our charges vary based on the type of work. We provide free estimates. Please call for detailed pricing.</p>
                                    <small class="text-muted">Asked 1 week ago</small>
                                </div>
                            </div>
                        </div>
                        
                        <button class="btn btn-outline-primary btn-sm">Post Your Question</button>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar p-4">
                    <h5 class="mb-3" style="color: #333;">Contact</h5>
                    <p class="text-muted mb-3" style="font-size: 13px;">Call to Rate</p>
                    
                    <!-- Address -->
                    <div class="mb-4">
                        <h6 class="mb-2">Address</h6>
                        <p class="mb-1" style="font-size: 13px;">{{ $business->business_address }}</p>
                        <p class="mb-1" style="font-size: 13px;">{{ $business->city }}</p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-orange btn-sm">
                                <i class="fas fa-directions me-1"></i> Get Directions
                            </button>
                            <button class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-copy me-1"></i> Copy
                            </button>
                        </div>
                    </div>

                    <!-- Contact Actions -->
                    <div class="contact-item">
                        <i class="fas fa-clock contact-icon"></i>
                        <span style="font-size: 13px;">Open 24 Hrs</span>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-clock contact-icon"></i>
                        <span style="font-size: 13px;">Suggest new hours</span>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-share contact-icon"></i>
                        <span style="font-size: 13px;">Share</span>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-star contact-icon"></i>
                        <span style="font-size: 13px;">Tap to rate</span>
                    </div>

                    <!-- Enquiry Form -->
                    <div class="enquiry-form">
                        <h6 class="mb-2">Get the List of Top Electricians</h6>
                        <p class="text-muted mb-3" style="font-size: 12px;">
                            We'll send you curated details in seconds for free
                        </p>
                        
                        <div class="form-section">
                            <h6 class="mb-2" style="font-size: 14px;">What type of Electrical services are you looking for?</h6>
                            <div class="radio-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="service" id="wiring" checked>
                                    <label class="form-check-label" for="wiring" style="font-size: 13px;">Wiring</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="service" id="installation">
                                    <label class="form-check-label" for="installation" style="font-size: 13px;">Installation</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="input-group-item">
                                <i class="fas fa-user input-icon"></i>
                                <span style="font-size: 13px; color: #6c757d;">Name</span>
                            </div>
                            <div class="input-group-item">
                                <i class="fas fa-phone input-icon"></i>
                                <span style="font-size: 13px; color: #6c757d;">Mobile Number</span>
                            </div>
                        </div>

                        <button class="btn btn-orange w-100">
                            Send Enquiry <i class="fas fa-chevron-right ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection