@extends('layouts.template')
@section('content')
<section class="pt-0 promotion-section">
    <div class="promotion-image slider-for custome-arrow classic-arrow">
        <div>
            <img src="assets/images/furniture-images/poster/4copy-remove.png" class="img-fluid blur-up lazyload" alt="">
        </div>
        <div>
            <img src="assets/images/furniture-images/poster/5copy-remove.png" class="img-fluid blur-up lazyload" alt="">
        </div>
        <div>
            <img src="assets/images/furniture-images/poster/6copy-remove.png" class="img-fluid blur-up lazyload" alt="">
        </div>
    </div>
    <div class="slider-nav image-show">
        <div>
            <div class="promotion-img">
                <img src="assets/images/furniture-images/poster/t4.png" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>
        </div>
        <div>
            <div class="promotion-img">
                <img src="assets/images/furniture-images/poster/t5.png" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>

        </div>
        <div>
            <div class="promotion-img">
                <img src="assets/images/furniture-images/poster/t6.png" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-contain">
        <div class="banner-left">
            {{-- <h4>Sale <span class="theme-color">35% Off</span></h4> --}}
            <h1>New Latest <span>Phone</span></h1>
            <p>Buy Now</p>
            <h2>$1500 <span class="theme-color"></del><!-- sale_price --> </span></h2>
            <p class="promotion-details mb-0">Discover and buy the latest smartphones. Shop top brands and enjoy 
            great prices!
                </p>
        </div>
    </div>

    <div class="right-side-contain">
        <div class="social-image">
            <h6>Facebook</h6>
        </div>

        <div class="social-image">
            <h6>Instagram</h6>
        </div>

        <div class="social-image">
            <h6>Twitter</h6>
        </div>
    </div>
</section>
<!-- banner section start -->
<section class="ratio2_1 banner-style-2">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="{{ route("shop.index") }}" class="banner-img">
                        <img src="assets/images/phone/iphone-15.png" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <a href="{{ route("shop.index") }}" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">New Iphone 15</h2>
                            <span>Buy Now</span> 
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="{{ route("shop.index") }}" class="banner-img">
                        <img src="assets/images/phone/samsung-s24-back.jpg" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <a href="{{ route("shop.index") }}" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">Samsung S24</h2>
                            <span>Buy Now</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="{{ route("shop.index") }}" class="banner-img">
                        <img src="assets/images/phone/google-pixel-8.png" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <a href="{{ route("shop.index") }}" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">Google Pixel 8</h2>
                            <span>Buy Now</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner section end -->

<!-- category section start -->
<section class="category-section ratio_40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title title-2 text-center">
                    <h2>Our Category</h2>
                    <h5 class="text-color">Our collection</h5>
                </div>
            </div>
        </div>
        <div class="row gy-3">
            <div class="col-xxl-2 col-lg-3">
                <div class="category-wrap category-padding category-block theme-bg-color">
                    <div>
                        <h2 class="light-text">Top</h2>
                        <h2 class="top-spacing">Our Top</h2>
                        <span>Categories</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-10 col-lg-9">
                <div class="category-wrapper category-slider1 white-arrow category-arrow">
                    <div>
                        <a href="http://127.0.0.1:8000/shop?page=1&size=12&order=-1&brands=&categories=455&prange=0%2C5000" class="category-wrap category-padding">
                            <img src="assets/images/phone/category/1.png" class="bg-img blur-up lazyload"
                                alt="category image">
                            <div class="category-content category-text-1">
                                <h3 class="theme-color">iOS</h3>
                                <span class="text-dark">Apple</span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="http://127.0.0.1:8000/shop?page=1&size=12&order=-1&brands=&categories=461&prange=0%2C5000" class="category-wrap category-padding">
                            <img src="assets/images/phone/category/2.png" class="bg-img blur-up lazyload"
                                alt="category image">
                            <div class="category-content category-text-1">
                                <h3 class="theme-color">Android</h3>
                                <span class="text-dark">Samsung</span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                            <img src="assets/images/phone/category/3.png" class="bg-img blur-up lazyload"
                                alt="category image">
                            <div class="category-content category-text-1">
                                <h3 class="theme-color">Affordable<br>Phones</h3>
                                <span class="text-dark"></span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                            <img src="assets/images/phone/category/4.png" class="bg-img blur-up lazyload"
                                alt="category image">
                            <div class="category-content category-text-1">
                                <h3 class="theme-color">Expensive<br>Phones</h3>
                                <span class="text-dark"></span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="category-wrap category-padding">
                            <img src="assets/images/phone/category/3.png" class="bg-img blur-up lazyload"
                                alt="category image">
                            <div class="category-content category-text-1">
                                <h3 class="theme-color">Fast<br>Shipping</h3>
                                <span class="text-dark"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- category section end -->

<section class="ratio_asos overflow-hidden">
    <div class="container p-sm-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2>New Arrival</h2>
                    <h5 class="theme-color">Our Collection</h5>
                </div>
            </div>
        </div>
        <style>
            .r-price {
                display: flex;
                flex-direction: row;
                gap: 20px;
            }

            .r-price .main-price {
                width: 100%;
            }

            .r-price .rating {
                padding-left: auto;
            }

            .product-style-3.product-style-chair .product-title {
                text-align: left;
                width: 100%;
            }

            @media (max-width:600px) {

                .product-box p,
                .product-box a {
                    text-align: left;
                }

                .product-style-3.product-style-chair .main-price {
                    text-align: right !important;
                }
            }
        </style>
        <div class="row g-sm-4 g-3">
            @foreach($latestProducts as $product)
                <div class="col-xl-2 col-lg-2 col-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <a href="{{ route('shop.product.details',['slug'=>$product->slug]) }}">
                                <img src="assets/images/uploads/products/{{ $product->image }}"
                                    class="w-100 bg-img blur-up lazyload" alt="">
                            </a>
                            <div class="circle-shape"></div>
                            <span class="background-text">Phone</span>
                            <div class="label-block">
                                <span class="label label-theme">{{ round((($product->regular_price - $product->sale_price)/$product->regular_price)*100) }}
                                    % off</span></span>
                            </div>
                        </div>
                        
                        <div class="product-style-3 product-style-chair">
                            <div class="product-title d-block mb-0">
                                <div class="r-price">
                                    <div class="theme-color">{{ $product->regular_price }}</div>
                                    <div class="main-price">
                                        <ul class="rating mb-1 mt-0">
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="font-light mb-sm-2 mb-0">{{ $product->brand->name }}</p>
                                <a href="{{ route('shop.product.details',['slug'=>$product->slug]) }}" class="font-default">
                                    <h5>{{ $product->name }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .products-c .bg-size {
        background-position: center 0 !important;
    }
</style>

@endsection