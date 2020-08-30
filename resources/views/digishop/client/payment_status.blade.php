@extends('digishop.client.layout.layout')

@section('title','Checkout')

@section('style')

@endsection


@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">

        <div class="row">

            <!-- Content Body -->
            <div class="col-lg-9">

                @if (\Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {!! \Session::get('success') !!}
                    </div>
                @endif


                <div class="mb-6"></div><!-- margin -->

                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="product-column">
                            <h3 class="title">New</h3>

                            @foreach (products(null, 3) as $product)
                                <div class="product-default left-details product-widget mb-3">
                                    <figure>
                                    <a href="{{route('product',$product->slug)}}">
                                        <img src="{{$product->feature_image ? $product->feature_image : asset('public/admin/images/default-product-image.jpg')}}">
                                    </a>
                                    </figure>
                                    <div class="product-details">
                                    <h2 class="product-title">
                                        <a href="{{route('product',$product->slug)}}">{{$product->name}}</a>
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
                                    <a href="{{route('product',$product->slug)}}">
                                        <img src="{{$product->feature_image ? $product->feature_image : asset('public/admin/images/default-product-image.jpg')}}">
                                    </a>
                                    </figure>
                                    <div class="product-details">
                                    <h2 class="product-title">
                                        <a href="{{route('product',$product->slug)}}">{{$product->name}}e</a>
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
                                    <a href="{{route('product',$product->slug)}}">
                                        <img src="{{$product->feature_image ? $product->feature_image : asset('public/admin/images/default-product-image.jpg')}}">
                                    </a>
                                    </figure>
                                    <div class="product-details">
                                    <h2 class="product-title">
                                        <a href="{{route('product',$product->slug)}}">{{$product->name}}</a>
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

                @include('digishop.client.includes.sidemenu')

                @include('digishop.client.includes.widget_side_banner')

                @include('digishop.client.includes.widget_side_newsletter')

                @include('digishop.client.includes.widget_side_testimonials')

                @include('digishop.client.includes.widget_side_news')

            </aside><!-- End .col-lg-3 -->

        </div><!-- End .row -->

    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->

@endsection


@section('javascript')
    <script src="{{asset('public/themes/digishop/js/nouislider.min.js')}}"></script>
    <script>
      $(function(){
         'use strict'

      });
    </script>
@endsection
