<!DOCTYPE html>
<html lang="en">


  @include('digishop.admin.partials.header')

  <body>

    @include('digishop.admin.partials.sidebar')


    <div class="content ht-100v pd-0" id="app">

      	@include('digishop.admin.partials.nav')

      	@yield('content')

    </div>

    	@yield('modal')

        @include('digishop.admin.partials.footer')

        <script>
            @if(Session::has('message'))
                var alertType = {!! json_encode(Session::get('alert-type', 'info')) !!};
                var alertMessage = {!! json_encode(Session::get('message')) !!};

                if(alertType == 'success'){
                    toast({
                        type: "success",
                        title: alertMessage
                    });
                }

                if(alertType == 'error'){
                    toast({
                        type: "error",
                        title: alertMessage
                    });
                }

                if(alertType == 'warning'){
                    toast({
                        type: "warning",
                        title: alertMessage
                    });
                }

                if(alertType == 'info'){
                    toast({
                        type: "info",
                        title: alertMessage
                    });
                }

            @endif

            @if(Session::has('errors'))

            @endif
        </script>
  </body>
</html>
