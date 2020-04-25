
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

    

    <div class="rows row-lgs">

        <a href="{{route('post.create')}}"  class="btn btn-primary btn-xs mg-t-20">Add Post</a>
        
        <div data-label="Example" class="mg-t-15">
          <table id="example2" class="table table-color-primary">
            <thead>
              <tr>
                <th class="">ID</th>
                <th class="">Title</th>
                <th class="">Author</th>
                <th class="">Category</th>
                <th class="">Status</th>
                <th class="">Created</th>
                <th class="">Action</th>
              </tr>
            </thead>
            
            <tbody>
            </tbody>
            
          </table>
        </div><!-- df-example -->
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
            { data: 'id', name: 'id' },
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


        
        

    });
  </script>

@endsection