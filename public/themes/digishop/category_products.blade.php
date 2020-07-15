@extends('digishop.layout')

@section('title','Category')

@section('style')

@endsection


@section('content')

<main class="main">

    <div class="banner banner-cat" style="background-image: url({{asset('public/themes/digishop/images/banners/banner-top.jpg')}});">
        <div class="banner-content container">
            <h2 class="banner-subtitle">check out over <span>200+</span></h2>
            <h1 class="banner-title">
                INCREDIBLE deals
            </h1>
            <a href="#" class="btn btn-dark">Shop Now</a>
        </div><!-- End .banner-content -->
    </div><!-- End .banner -->

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Electronics</a></li>
                <li class="breadcrumb-item active" aria-current="page">Headsets</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-9">

                <nav class="toolbox">
                    <div class="toolbox-left">
                        <div class="toolbox-item toolbox-sort">
                            <div class="select-custom">
                                <select name="orderby" class="form-control">
                                    <option value="menu_order" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </div><!-- End .select-custom -->

                            <a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set Ascending Direction</span></a>
                        </div><!-- End .toolbox-item -->
                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-item toolbox-show">
                        <label>Showing 1–9 of 60 results</label>
                    </div><!-- End .toolbox-item -->

                    <div class="layout-modes">
                        <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                            <i class="icon-mode-grid"></i>
                        </a>
                        <a href="category-list.html" class="layout-btn btn-list" title="List">
                            <i class="icon-mode-list"></i>
                        </a>
                    </div><!-- End .layout-modes -->
                </nav>

                <div class="row row-sm">
                    @foreach($products as $product)
                        <div class="col-6 col-md-4">
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
                                    <h2 class="product-title">
                                        <a href="{{route('product',$product->slug)}}">{{$product->name}}</a>
                                    </h2>
                                    <div class="price-box">
                                        <span class="product-price">{{$product->price}}</span>
                                    </div><!-- End .price-box -->
                                    <div class="product-action">
                                        <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                    </div>
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                    @endforeach
                </div>

                <nav class="toolbox toolbox-pagination">
                    <div class="toolbox-item toolbox-show">
                        <label>Showing 1–9 of 60 results</label>
                    </div><!-- End .toolbox-item -->

                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><span>...</span></li>
                        <li class="page-item"><a class="page-link" href="#">15</a></li>
                        <li class="page-item">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div><!-- End .col-lg-9 -->

            <aside class="sidebar-shop col-lg-3 order-lg-first">
                <div class="sidebar-wrapper">

                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true" aria-controls="widget-body-1">{{$category->name}}</a>
                        </h3>

                        <div class="collapse show" id="widget-body-1">
                            <div class="widget-body">
                                <ul class="cat-list">
                                    @foreach($category->child as $c1)
                                        <li><a href="{{route('category.products',$c1->slug)}}">{{$c1->name}}</a></li>
                                        @if(!$c1->child->isEmpty())
                                            @foreach($c1->child as $c2)
                                                <li><a href="{{route('category.products',$c2->slug)}}">{{$c2->name}}</a></li>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </ul>
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Price</a>
                        </h3>

                        <div class="collapse show" id="widget-body-2">
                            <div class="widget-body">
                                <form action="#">
                                    <div class="price-slider-wrapper">
                                        <div id="price-slider"></div><!-- End #price-slider -->
                                    </div><!-- End .price-slider-wrapper -->

                                    <div class="filter-price-action">
                                        <button type="submit" class="btn btn-primary">Filter</button>

                                        <div class="filter-price-text">
                                            <span id="filter-price-range"></span>
                                        </div><!-- End .filter-price-text -->
                                    </div><!-- End .filter-price-action -->
                                </form>
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true" aria-controls="widget-body-4">Brands</a>
                        </h3>

                        <div class="collapse show" id="widget-body-4">
                            <div class="widget-body">
                                <ul class="cat-list">
                                    <li><a href="#">Adidas <span>18</span></a></li>
                                    <li><a href="#">Camel <span>22</span></a></li>
                                    <li><a href="#">Seiko <span>05</span></a></li>
                                    <li><a href="#">Samsung Galaxy <span>68</span></a></li>
                                    <li><a href="#">Sony <span>03</span></a></li>
                                </ul>
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget widget-featured">
                        <h3 class="widget-title">Featured Products</h3>

                        <div class="widget-body">
                            <div class="owl-carousel widget-featured-products">
                                <div class="featured-col">
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="{{asset('public/themes/digishop/images/products/home-featured-1.jpg')}}">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h2 class="product-title">
                                                <a href="product.html">Product Short Name</a>
                                            </h2>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="{{asset('public/themes/digishop/images/products/home-featured-1.jpg')}}">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h2 class="product-title">
                                                <a href="product.html">Product Short Name</a>
                                            </h2>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="{{asset('public/themes/digishop/images/products/home-featured-1.jpg')}}">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h2 class="product-title">
                                                <a href="product.html">Product Short Name</a>
                                            </h2>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .featured-col -->

                                <div class="featured-col">
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="{{asset('public/themes/digishop/images/products/home-featured-3.jpg')}}">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h2 class="product-title">
                                                <a href="product.html">Product Short Name</a>
                                            </h2>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="{{asset('public/themes/digishop/images/products/home-featured-3.jpg')}}">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h2 class="product-title">
                                                <a href="product.html">Product Short Name</a>
                                            </h2>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="{{asset('public/themes/digishop/images/products/home-featured-3.jpg')}}">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h2 class="product-title">
                                                <a href="product.html">Product Short Name</a>
                                            </h2>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$49.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .featured-col -->
                            </div><!-- End .widget-featured-slider -->
                        </div><!-- End .widget-body -->
                    </div><!-- End .widget -->

                </div><!-- End .sidebar-wrapper -->
            </aside><!-- End .col-lg-3 -->

        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->

</main>

@endsection


@section('javascript')
    <script src="{{asset('public/themes/digishop/js/nouislider.min.js')}}"></script>
    <script>
      $(function(){
         'use strict'

      });
    </script>
@endsection
