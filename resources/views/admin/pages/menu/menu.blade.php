
@extends('admin.layout.admin')

@section('title','Menu')


@section('style')

   <!-- <link href="{{asset('public/admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet"> -->
   <!-- <link href="{{asset('public/admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet"> -->

@endsection


@section('content')

<div class="content-body " id="contentbody">

   <div class="card">

      <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
         <div>
               <nav aria-label="breadcrumb">
               <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><a href="{{route('app.admin.home')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Menu</li>
               </ol>
               </nav>
         </div>
      </div>

      <div class="">

         <div class="d-flex mg-b-20">
            <h4>Menus</h4>
            <a href="{{route('menu.create')}}" class="btn btn-success btn-xs mg-l-10">Add New Menu</a>
         </div>

         <!-- Menu info -->
         <div class="alert alert-primary" role="alert" style="margin:0">
            <b>How To Use:</b>
            <p>
               You can output a menu anywhere on your site by calling
               <b>menu('name')</b>
            </p>
            <p>
               <li>menu('name','view') <small>Create a view for menu and include <a href="">Example</a></small></li>
               <li>menu('name','_json') <small>Raw json response of build Menu</small></li>
            </p>
         </div>
         <!-- Menu info -->


         <div class="mg-t-20">
            <div data-label="Example" class="mg-t-15">
               <table id="example2" class="table table-color-primary">
                  <thead>
                  <tr style="padding-left:20px">
                     <th style="width:80%" class=""><b>Menu Name</b></th>
                     <th style="width:15%" class=""><b>Actions</b></th>
                  </tr>
                  </thead>

                  <tbody>
                  </tbody>

               </table>
            </div><!-- df-example -->
         </div>

      </div><!-- row -->




   </div>

</div>

@endsection


@section('modal')



@endsection


@section('javascript')
   <script src="{{asset('public/admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
   <!-- <script src="{{asset('public/admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script> -->
   <!-- <script src="{{asset('public/admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script> -->
   <!-- <script src="{{asset('public/admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script> -->

  	<script>

      function deletemenu(e){
         swalWithBootstrapButtons({
            title: "Delete Selected Menu?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            reverseButtons: true
         }).then(result => {
            if (result.value) {
               var id = e;
               var token = $("meta[name='csrf-token']").attr("content");
               $.ajax(
               {
                  url: "menu/"+id,
                  type: 'DELETE',
                  data: {
                        "id": id,
                        "_token": token,
                  },
                  error:function(e){
                     console.log(e)
                  },
                  success: function (){
                        console.log("it Works");
                  }
               });
            }
         });
      }

      $(function(){
         'use strict'

         $('#example2').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('menu.index') !!}',
            columns:[
               { data: 'name', name: 'name',orderable:true},
               { data: 'action', name: 'action' },
            ]
         });

         $('.btn-del').on('click', function (e) {
            console.log('Delete clicked');
         });

         $(document).on('click','.delete',function(){
            var id =  $(this).attr('id');
            swalWithBootstrapButtons({
               title: "Delete Selected Menu?",
               text: "You won't be able to revert this!",
               type: "warning",
               showCancelButton: true,
               confirmButtonText: "Delete",
               cancelButtonText: "Cancel",
               reverseButtons: true
            }).then(result => {
               if (result.value) {
                  $.ajax({
                     url: "menu/"+id,
                     type:"post",
                     data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                     success: function(result){
                        location.reload();
                        toast({
                           type: "success",
                           title: "Menu Deleted Successfully"
                        });
                     }
                  });
               }
            });
         });

      });
  	</script>

@endsection
