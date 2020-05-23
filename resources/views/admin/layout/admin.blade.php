<!DOCTYPE html>
<html lang="en">
  

  @include('admin.partials.header')

  <body>
    @include('sweetalert::alert')
    
    @include('admin.partials.sidebar')


    <div class="content ht-100v pd-0" id="root">

      	@include('admin.partials.nav')

      	@yield('content')

    </div>

    	@yield('modal')

  @include('admin.partials.footer')  

   
  </body>
</html>
