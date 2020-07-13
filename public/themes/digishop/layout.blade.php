<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="keywords" content="HTML5 Template" />
   <meta name="description" content="Digishop theme">
   <meta name="author" content="DZ-THEMES">


   <title>{{setting('app.theme')}} | @yield('title') </title>

   <!-- Plugins CSS File -->
   <link rel="stylesheet" href="{{asset('public/themes/digishop/css/bootstrap.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('public/themes/digishop/vendor/fontawesome-free/css/all.min.css')}}">

   <!-- Main CSS File -->
   <link rel="stylesheet" href="{{asset('public/themes/digishop/css/style.min.css')}}">


</head>
<body>
    <div class="page-wrapper">
      @include('digishop.header')
      @yield('content')
      @include('digishop.footer')
    </div>

   <!-- Add Cart Modal -->
   <div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body add-cart-box text-center">
          <p>You've just added this product to the<br>cart:</p>
          <h4 id="productTitle"></h4>
          <img src="#" id="productImage" width="100" height="100" alt="adding cart image">
          <div class="btn-actions">
                <a href="{{route('cart')}}"><button class="btn-primary">Go to cart page</button></a>
              <a href="#"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>



   <!-- Plugins JS File -->
   <script src="{{asset('public/themes/digishop/js/jquery.min.js')}}"></script>
   <script src="{{asset('public/themes/digishop/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('public/themes/digishop/js/plugins.min.js')}}"></script>

   <!-- Main JS File -->
   <script src="{{asset('public/themes/digishop/js/main.min.js')}}"></script>

   @yield('javascript')

</body>
</html>
