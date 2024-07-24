@extends('layouts.template')
@section('content')
    <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>About Us</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('app.index') }}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- team leader section Start -->
    <section class="overflow-hidden">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-5 offset-xl-1">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <img src="assets/images/inner-page/review-image/6.jpg"
                                class="img-fluid rounded-3 about-image" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="assets/images/inner-page/review-image/7.jpg"
                                class="img-fluid rounded-3 about-image" alt="">
                        </div>
                        <div class="col-12 ratio_40">
                            <div>
                                <img src="assets/images/inner-page/review-image/8.jpg"
                                    class="img-fluid rounded-3 team-image bg-img" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5">
                    <div class="about-details">
                        <div>
                            <h2>WHO WE ARE</h2>
                            <h3>Mobile Store Online</h3>
                            <p>At Mobile Store, our team is dedicated to offering range of  mobile devices from leading brands.
                                Our commitment  to creating user-friendly interfaces ensures easy navigation for all users.</p>
                            <p>Discover  and explore our collection of mobile products, designed to 
                                improve your 
                                everyday life whether you're at 
                                work, home or on travelling.</p>
                            <button onclick="location.href = '{{ route("shop.index") }}';" type="button"
                                class="btn btn-solid-default">Shop Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team leader section End -->  
@endsection