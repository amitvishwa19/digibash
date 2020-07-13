
@extends('admin.layout.admin')

@section('title','Post')


@section('style')

  <link href="{{asset('public/admin/lib/quill/quill.core.css')}}" rel="stylesheet">
  <link href="{{asset('public/admin/lib/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('public/admin/lib/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('public/admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/admin/lib/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
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
            <li class="breadcrumb-item active" aria-current="page">Posts</li>
          </ol>
        </nav>
      </div> 
    </div>
    
    @include('admin.partials.alerts')

    

    <div class="">

      <div class="d-flex mg-b-20">
        <h4>Posts</h4>
        <a href="{{route('post.create')}}" class="btn btn-primary btn-xs mg-l-10 pd-t-8"> Add New Post</a>
      </div>
        
      <div class="mg-t-20">  
        <div data-label="Example" class="mg-t-15">
          <table id="example2" class="table table-color-primary">
            <thead>
              <tr>
                <th class=""><b>Title</b></th>
                <th class=""><b>Author</b></th>
                <th class=""><b>Category</b></th>
                <th class=""><b>Status</b></th>
                <th class=""><b>Created</b></th>
                <th class=""><b>Action</b></th>
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

  <script src="{{asset('public/admin/lib/quill/quill.min.js')}}"></script>
  <script src="{{asset('public/admin/lib/select2/js/select2.min.js')}}"></script>
  <script src="{{asset('public/admin/lib/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{asset('public/admin/lib/quill/quill.min.js')}}"></script>


  <script src="{{asset('public/admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('public/admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
  <script src="{{asset('public/admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('public/admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>


  <script>
    $(function(){
        'use strict'

        //console.log({!! 'posts' !!});

        $('#example2').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! route('post.index') !!}',
          order: [[0,"desc"]],
          columns:[
            { data: 'title', name: 'title' },
            { data: 'author', name: 'author' },
            { data: 'category', name: 'category',orderable: false },
            { data: 'status', name: 'status'},
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action',orderable:false },
  
          ]
        });

        $('.select2').select2({
          placeholder: 'Choose one',
          searchInputPlaceholder: 'Search options'
        });


        $(document).on('click','.delete',function(){
            var id =  $(this).attr('id');
            swalWithBootstrapButtons({
               title: "Delete Selected Post?",
               text: "You won't be able to revert this!",
               type: "warning",
               showCancelButton: true,
               confirmButtonText: "Delete",
               cancelButtonText: "Cancel",
               reverseButtons: true
            }).then(result => {
               if (result.value) {
                  $.ajax({
                     url: "post/"+id,
                     type:"post",
                     data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                     success: function(result){
                        location.reload();
                        toast({
                           type: "success",
                           title: "Post Deleted Successfully"
                        });
                     }
                  });
               }
            });
         });
        

    });
  </script>

@endsection