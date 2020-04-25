<!DOCTYPE html>
<html lang="en">
  

  @include('admin.partials.head')

  <body>
    @include('sweetalert::alert')
    
    @include('admin.partials.sidebar')


    <div class="content ht-100v pd-0">

      	@include('admin.partials.content_header')

      	@yield('content')

    </div>

    	@yield('modal')

  @include('admin.partials.javascript')  

   
  </body>
</html>
