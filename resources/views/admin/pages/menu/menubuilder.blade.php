
@extends('admin.layout.admin')

@section('title','Menu')


@section('style')

    <!-- <link href="{{asset('public/admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
   <link href="{{asset('public/admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet"> -->

@endsection


@section('content')

<div class="content-body " id="contentbody">

    <div class="card">

      <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="{{route('app.admin.home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('menu.index')}}">Menu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Builder</li>
                </ol>
                </nav>
            </div>
      </div>

      @include('admin.partials.alerts')

      <div class="">

         <div class="d-flex mg-b-20">
            <h4>Menu Builder ( {{$menu->name}} )</h4>
            <a href="{{route('menu.item.create',['menu' => $menu->id,'id'=>$menu->id])}}"  class="btn btn-success btn-xs mg-l-10">New Menu Item</a>
         </div>
         <!-- Menu info -->
         <div class="alert alert-primary" role="alert" style="margin:0">
            <b>How To Use:</b>
            <p>
               You can output a menu anywhere on your site by calling
               <b>menu('name')</b>
            </p>
         </div>

         <!-- Menu info -->
         <div class="mg-t-20">
            <div class="dd">
                {{menu($menu->name,'admin.partials.menus.admin_menu_builder')}}
            </div>
         </div>

    </div><!-- row -->




   </div>

</div>

@endsection


@section('modal')



@endsection


@section('javascript')
    <!-- <script src="{{asset('public/admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('public/admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script> -->

  	<script>
      $(function(){
         'use strict'

        $('.dd').nestable({
            onDragStart: function(l,e){
                // l is the main container
                // e is the element that was moved
                //console.log(l)
                //console.log(e)
            }
        });

        $('.dd').on('change', function (e) {
            $.post('{{ route('menu.builder.order.item',['menu' => $menu->id]) }}', {
                order: JSON.stringify($('.dd').nestable('serialize')),
                _token: '{{ csrf_token() }}'
            }, function (data) {
                toast({
                    type: "success",
                    title: "Menu reordered successfully"
                });
            });
        });

        $(document).on('click','.btn-menu-item',function(){
            var itemId =  $(this).attr('id');
            var menuId =  $(this).attr('data-menu-id');
            swalWithBootstrapButtons({
               title: "Delete Selected Menu item?",
               text: "You won't be able to revert this!",
               type: "warning",
               showCancelButton: true,
               confirmButtonText: "Delete",
               cancelButtonText: "Cancel",
               reverseButtons: true
            }).then(result => {
               if (result.value) {
                  $.ajax({
                     url: "builder/" + itemId + "/delete?itemid="+ itemId,
                     type:"post",
                     data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                     success: function(result){
                        location.reload();
                        toast({
                           type: "success",
                           title: "Menu Item Deleted Successfully"
                        });
                     }
                  });
                  //console.log('Deleted item:' + menuId)
               }
            });
        });

      });
  	</script>

@endsection
