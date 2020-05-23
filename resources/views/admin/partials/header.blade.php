<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    

    <!-- Meta -->
    <meta name="description" content="Leading digital development agency">
    <meta name="author" content="Digizigs">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{Auth::check() ? Auth::user()->id : ''}}">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('public/admin/assets/d-fevicon.png')}}" type="image/ico" />

    <title>DIgibash | @yield('title') </title>

    <!-- vendor css -->
    <link href="{{asset('public/admin/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    @yield('style')

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{asset('public/admin/css/app.css')}}">
    <!--link rel="stylesheet" href="{{asset('public/admin/css/dashforge.css')}}"-->
    <link rel="stylesheet" href="{{asset('public/admin/css/dashforge.dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/css/skin.charcoal.css')}}">

    
    

  </head>