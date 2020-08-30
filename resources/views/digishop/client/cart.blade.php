@extends('digishop.client.layout.layout')

@section('title','Cart')

@section('style')

@endsection


@section('content')

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav>



    <div class="container">

        <div class="row">

            <!-- Content Body -->
            <div class="col-lg-9">

                <div class="row">

                    @if($items->count() == 0)

                    <div class="col-lg-12">
                        <div class="alert alert-info" role="alert">
                            <strong>No items in your cart</strong>
                        </div>
                    </div>

                    @else

                    <div class="col-lg-8">

                        <div class="cart-table-container">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th class="product-col">Product</th>
                                        <th class="price-col">Price</th>
                                        <th class="qty-col">Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr class="product-row">
                                            <td class="product-col">
                                                <figure class="product-image-container">
                                                    <a href="{{route('product',$item->associatedModel->slug)}}" class="product-image">
                                                        <img src="{{$item->associatedModel->feature_image ? $item->associatedModel->feature_image : asset('public/admin/images/default-product-image.jpg')}}" alt="{{$item->name}}" >
                                                    </a>
                                                </figure>
                                                <h2 class="product-title">
                                                    <a href="{{route('product',$item->associatedModel->slug)}}">{{$item->name}}</a>
                                                </h2>
                                            </td>
                                            <td>₹ {{$item->price}}</td>
                                            <td>
                                                <input class="vertical-quantity form-control" type="text" value="{{$item->quantity}}">
                                            </td>
                                            <td>₹ {{$item->price * $item->quantity}}</td>
                                        </tr>

                                        <tr class="product-action-row">
                                            <td colspan="4" class="clearfix">
                                                <div class="float-left">
                                                    <a href="#" class="btn-move">Move to Wishlist</a>
                                                </div><!-- End .float-left -->

                                                <div class="float-right">
                                                    <!--a href="#" title="Edit product" class="btn-edit"><span class="sr-only">Edit</span><i class="icon-pencil"></i></a-->
                                                    <a href="{{route('cart.item.delete',$item->id)}}" title="Remove product" class="btn-remove"><span class="sr-only">Remove</span></a>
                                                </div><!-- End .float-right -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="clearfix">
                                            <div class="float-left">
                                                <a href="{{route('home')}}" class="btn btn-outline-secondary">Continue Shopping</a>
                                            </div><!-- End .float-left -->

                                            <div class="float-right">
                                                <a href="{{route('cart.delete')}}" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
                                                <a href="{{route('cart')}}" class="btn btn-outline-secondary btn-update-cart">Update Shopping Cart</a>
                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- End .cart-table-container -->

                        <div class="cart-discount">
                            <h4>Apply Discount Code</h4>
                            <form action="{{route('cart.applycoupon')}}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="coupon" class="form-control form-control-sm" placeholder="Enter discount code"  required>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="submit">Apply Discount</button>
                                    </div>
                                </div><!-- End .input-group -->
                            </form>
                        </div><!-- End .cart-discount -->
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h3>Summary</h3>

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>₹ {{$subtotal}}</td>
                                    </tr>

                                    <tr>
                                        <td>Tax</td>
                                        <td>₹ 0.00</td>
                                    </tr>

                                    <tr>
                                        <td>Discount</td>
                                        <td>₹ 0.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Order Total</td>
                                        <td>₹ {{$subtotal}}</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="checkout-methods">
                                <a href="{{route('cart.checkout')}}" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                            </div><!-- End .checkout-methods -->
                        </div><!-- End .cart-summary -->
                    </div><!-- End .col-lg-4 -->

                    @endif

                </div>


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

                @include('digishop.client.includes.sidemenu')

                @include('digishop.client.includes.widget_side_banner')

                @include('digishop.client.includes.widget_side_newsletter')

                @include('digishop.client.includes.widget_side_testimonials')

                @include('digishop.client.includes.widget_side_news')

            </aside><!-- End .col-lg-3 -->

        </div><!-- End .row -->

    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->

@endsection


@section('javascript')
   <script>
      $(function(){
         'use strict'

         console.log('index Loaded')

      });
   </script>
@endsection
