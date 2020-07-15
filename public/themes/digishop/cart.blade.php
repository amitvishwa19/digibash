@extends('digishop.layout')

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

            @if(\Cart::session(auth()->id())->isEmpty())
                <div class="col-12">
                    <h4>No items in your cart</h4>
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
                                            <a href="product.html" class="product-image">
                                                <img src="{{$item->associatedModel->feature_image}}" alt="{{$item->name}}" >
                                            </a>
                                        </figure>
                                        <h2 class="product-title">
                                            <a href="product.html">{{$item->name}}</a>
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
                    <form action="#">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Enter discount code"  required>
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
                                <td>₹ {{Cart::session(auth()->id())->getSubTotal()}}</td>
                            </tr>

                            <tr>
                                <td>Tax</td>
                                <td>$0.00</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Order Total</td>
                                <td>₹ {{Cart::session(auth()->id())->getSubTotal()}}</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        <a href="{{route('cart.checkout')}}" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                    </div><!-- End .checkout-methods -->
                </div><!-- End .cart-summary -->
            </div><!-- End .col-lg-4 -->

            @endif


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
