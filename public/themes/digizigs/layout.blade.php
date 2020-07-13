<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{setting('app.theme')}} | @yield('title') </title>

   <!-- Custom blade style -->
     @yield('style')
   <!-- Custom blade style -->

</head>
<body>
   

   @yield('content')

   <!-- Custom blade javascript -->
   @yield('javascript')
   <!-- Custom blade javascript -->

</body>
</html>