
@extends('admin.layout.admin')

@section('title','Page')


@section('style')
   <link href="{{asset('public/admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
   <link href="{{asset('public/admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection


@section('content')
	
<div class="content-body " id="contentbody">
    
   <div class="card">

      <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
         <div>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><a href="{{route('app.admin.home')}}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Page</li>
               </ol>
            </nav>
         </div> 
      </div>

      <div class="">
         <div class="d-flex mg-b-20">
            <h4>Pages</h4>
            <a href="{{route('page.create')}}" class="btn btn-success btn-xs mg-l-10">Add New Page</a>
         </div>

         <div class="mg-t-20">
            <div data-label="Example" class="mg-t-15">
               <table id="example2" class="table table-color-primary">
                  <thead>
                  <tr style="padding-left:20px">
                     <th style="width:45%" class=""><b>Title</b></th>
                     <th style="width:15%" class=""><b>Author</b></th>
                     <th style="width:10%" class=""><b>Status</b></th>
                     <th style="width:15%" class=""><b>Created</b></th>
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
   <script src="{{asset('public/admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
   <script src="{{asset('public/admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
   <script src="{{asset('public/admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>
	
  	<script>
  		$(function(){
         'use strict'

         $('#example2').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('page.index') !!}',
            columns:[
               { data: 'title', name: 'title',orderable:true},
               { data: 'author', name: 'author' },
               { data: 'status', name: 'status' },
               { data: 'created_at', name: 'created_at' },
               { data: 'action', name: 'action' },
            ]
         });


         $(document).on('click','.delete',function(){
            var id =  $(this).attr('id');
            swalWithBootstrapButtons({
               title: "Delete Selected Page?",
               text: "You won't be able to revert this!",
               type: "warning",
               showCancelButton: true,
               confirmButtonText: "Delete",
               cancelButtonText: "Cancel",
               reverseButtons: true
            }).then(result => {
               if (result.value) {
                  $.ajax({
                     url: "page/"+id,
                     type:"post",
                     data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                     success: function(result){
                        location.reload();
                        toast({
                           type: "success",
                           title: "Page Deleted Successfully"
                        });
                     }
                  });
               }
            });
         });

      });
  	</script>

@endsection