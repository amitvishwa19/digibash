@extends('digishop.layout')

@section('title','Home')

@section('style')

@endsection


@section('content')

<main class="main">

    @include('digishop.includes.infobox')

    <div class="container">
        <div class="row">

            <!-- Content Body -->
            <div class="col-lg-9">

                <div class="home-slider owl-carousel owl-carousel-lazy owl-theme owl-theme-light">
                    <div class="home-slide">
                        <div class="owl-lazy slide-bg" data-src="{{asset('public/themes/digishop/images/slider/slide-1.jpg')}}"></div>
                        <div class="home-slide-content text-white">
                            <h3>Get up to <span>60%</span> off</h3>
                            <h1>Summer Sale</h1>
                            <p>Limited items available at this price.</p>
                            <a href="category.html" class="btn btn-dark">Shop Now</a>
                        </div><!-- End .home-slide-content -->
                    </div><!-- End .home-slide -->

                    <div class="home-slide">
                        <div class="owl-lazy slide-bg" data-src="{{asset('public/themes/digishop/images/slider/slide-2.jpg')}}"></div>
                        <div class="home-slide-content">
                            <h3>OVER <span>200+</span></h3>
                            <h1>GREAT DEALS</h1>
                            <p>While they last!</p>
                            <a href="category.html" class="btn btn-dark">Shop Now</a>
                        </div><!-- End .home-slide-content -->
                    </div><!-- End .home-slide -->

                    <div class="home-slide">
                        <div class="owl-lazy slide-bg" data-src="{{asset('public/themes/digishop/images/slider/slide-3.jpg')}}"></div>
                        <div class="home-slide-content">
                            <h3>up to <span>40%</span> off</h3>
                            <h1>NEW ARRIVALS</h1>
                            <p>Starting at $9</p>
                            <a href="category.html" class="btn btn-dark">Shop Now</a>
                        </div><!-- End .home-slide-content -->
                    </div><!-- End .home-slide -->
                </div><!-- End .home-slider -->

                <div class="row">
                    <div class="col-md-4">
                        <div class="banner banner-image">
                            <a href="#">
                                <img src="{{asset('public/themes/digishop/images/banners/banner-1.jpg')}}" alt="banner">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-md-4">
                        <div class="banner banner-image">
                            <a href="#">
                                <img src="{{asset('public/themes/digishop/images/banners/banner-2.jpg')}}" alt="banner">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-md-4">
                        <div class="banner banner-image">
                            <a href="#">
                                <img src="{{asset('public/themes/digishop/images/banners/banner-3.jpg')}}" alt="banner">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-4 -->
                </div><!-- End .row -->

                <div class="mb-3"></div><!-- margin -->

                <!-- Featured Products -->
                <h2 class="carousel-title">Featured Products</h2>
                <div class="home-featured-products owl-carousel owl-theme owl-dots-top">


                    @foreach (products() as $product)
                        <div class="product-default">
                            <figure>
                            <a href="{{route('product',$product->slug)}}">
                                    <img src="{{$product->feature_image ? $product->feature_image : asset('public/admin/images/default-product-image.jpg')}}">
                            </a>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="product-title text-center">
                                    <a href="product.html">{{$product->name}}</a>
                                </div>
                                <div class="price-box">
                                        <span class="product-price">₹ {{$product->price}}</span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                        <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                    @endforeach

                </div><!-- End .featured-proucts -->


                <div class="mb-6"></div><!-- margin -->

                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="product-column">
                            <h3 class="title">New</h3>

                            @foreach (products(null, 3) as $product)
                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                    <a href="product.html">
                                        <img src="{{$product->feature_image ? $product->feature_image : asset('public/admin/images/default-product-image.jpg')}}">
                                    </a>
                                    </figure>
                                    <div class="product-details">
                                    <h2 class="product-title">
                                        <a href="product.html">{{$product->name}}</a>
                                    </h2>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">₹ {{$product->price}}</span>
                                    </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            @endforeach

                        </div><!-- End .product-column -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-6 col-md-4">
                        <div class="product-column">
                            <h3 class="title">Hot</h3>

                            @foreach (products(null, 3) as $product)
                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                    <a href="product.html">
                                        <img src="{{$product->feature_image ? $product->feature_image : asset('public/admin/images/default-product-image.jpg')}}">
                                    </a>
                                    </figure>
                                    <div class="product-details">
                                    <h2 class="product-title">
                                        <a href="product.html">{{$product->name}}e</a>
                                    </h2>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">₹ {{$product->price}}</span>
                                    </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            @endforeach

                        </div><!-- End .product-column -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-6 col-md-4">
                        <div class="product-column">
                            <h3 class="title">Sale</h3>

                            @foreach (products(null, 3) as $product)
                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                    <a href="product.html">
                                        <img src="{{$product->feature_image ? $product->feature_image : asset('public/admin/images/default-product-image.jpg')}}">
                                    </a>
                                    </figure>
                                    <div class="product-details">
                                    <h2 class="product-title">
                                        <a href="product.html">{{$product->name}}</a>
                                    </h2>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">₹ {{$product->price}}</span>
                                    </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            @endforeach

                        </div><!-- End .product-column -->
                    </div><!-- End .col-md-4 -->
                </div><!-- End .row -->

                <div class="mb-3"></div><!-- margin -->

                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="icon-star"></i>

                            <div class="feature-box-content">
                                <h3>Dedicated Service</h3>
                                <p>Consult our specialists for help with an order, customization, or design advice</p>
                                <a href="#" class="btn btn-outline-dark">Get in touch</a>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-sm-6 col-md-4">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="icon-reply"></i>

                            <div class="feature-box-content">
                                <h3>Free Returns</h3>
                                <p>We stand behind our goods and services and want you to be satisfied with them.</p>
                                <a href="#" class="btn btn-outline-dark">Return Policy</a>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-md-4 -->

                    <div class="col-sm-6 col-md-4">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="icon-paper-plane"></i>

                            <div class="feature-box-content">
                                <h3>International Shipping</h3>
                                <p>Currently over 50 countries qualify for express international shipping.</p>
                                <a href="#" class="btn btn-outline-dark">Lear More</a>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-md-4 -->
                </div><!-- End .row -->

            </div><!-- End .col-lg-9 -->

            <!-- Sidebar -->
            <aside class="sidebar-home col-lg-3 order-lg-first">

                @include('digishop.includes.sidemenu')

                @include('digishop.includes.widget_side_banner')

                @include('digishop.includes.widget_side_newsletter')

                @include('digishop.includes.widget_side_testimonials')

                @include('digishop.includes.widget_side_news')

            </aside><!-- End .col-lg-3 -->

        </div><!-- End .row -->
    </div><!-- End .container -->

</main>

@endsection


@section('javascript')
   <script>
      $(function(){
         'use strict'

         console.log('index Loaded')

      });
   </script>
@endsection
