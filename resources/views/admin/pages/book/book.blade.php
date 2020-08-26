
@extends('admin.layout.admin')

@section('title','Book')

@section('style')
    <link href="{{asset('public/admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection


@section('content')

<div class="content-body " id="contentbody">

  <div class="card">

    <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{route('app.admin.home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Book</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">

      <div class=" mg-b-20">
        <div class="d-flex">
            <h4>Books</h4>
            <a href="{{route('book.create')}}" class="btn btn-primary btn-xs mg-l-10">Add New Book</a>
        </div>
        <div class="mg-t-10">
            <a href="{{route('book.index',['status'=>'all'])}}" class="wp-title mg-r-5" id="select_all">All Books</a>
            <a href="{{route('issuedbook.create')}}" class="wp-title mg-r-5" id="select_all">Issue Books</a>
            <a href="{{route('issuedbook.index')}}" class="wp-title mg-r-5" id="deselect_all">Issued Books</a>
            <a href="{{route('book.index',['status'=>'pending'])}}" class="wp-title mg-r-5" id="delete_all">Return Pending</a>
        </div>
      </div>


      <div class="mg-t-20">
        <div data-label="Example" class="mg-t-15">
            <table id="datatable" class="table table-color-primary">
              <thead>
              <tr style="padding-left:20px">
                    <th style="" class=""><b>Book Code</b></th>
                    <th style="" class=""><b>Title</b></th>
                    <th style="" class=""><b>Description</b></th>
                    <th style="" class=""><b>Type</b></th>
                    <th style="" class=""><b>Author</b></th>
                    <th style="" class=""><b>Status</b></th>
                    <th style="" class=""><b>Actions</b></th>
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

<div class="modal fade" id="issuebook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel4">Issue New Book(s)</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route('book.store')}}">
                @csrf

                    <div class="form-group">
                        <label class="d-block"><b>Select User</b></label>
                        <select name="" class="form-control @error('name') is-invalid @enderror">
                            <option value="">User Name</option>
                        </select>
                        @error('name')
                            <span class="" role="alert">
                                <strong><i>{{ $message }}</i></strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block"><b>Example Title</b></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{old('name')}}">
                        @error('name')
                            <span class="" role="alert">
                                <strong><i>{{ $message }}</i></strong>
                            </span>
                        @enderror
                    </div>

                    <!--Books-->
                    <div class="form-group">
                        <label for="formGroupExampleInput2" class="d-block" style="font-weight:600">Courses</label>
                        <div data-label="Example" class="">
                            <select class="form-control select2" multiple="multiple" name="books[]" multiple="">
                            <option label="Choose Course(s)"></option>
                            @foreach($books as $book)
                                <option value="{{$book->id}}">{{$book->title}}</option>
                            @endforeach
                            </select>
                        </div><!-- df-example -->
                    </div>


                  <button class="btn btn-primary btn-xs" id="btnpublish">Save</button>
                  <a href="#" data-dismiss="modal" class="btn btn-dark btn-xs">Cancel</a>


              </form>
        </div>

      </div>
    </div>
</div>

@endsection


@section('modal')



@endsection


@section('javascript')
    <script src="{{asset('public/admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/admin/lib/select2/js/select2.min.js')}}"></script>
    <script>
        $(function(){
        'use strict'


        //Datatable
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('book.index') !!}',
            columns:[
                { data: 'book_code', name: 'book_code'},
                { data: 'title', name: 'title'},
                { data: 'description', name: 'description'},
                { data: 'type', name: 'type'},
                { data: 'author', name: 'author'},
                { data: 'status', name: 'status'},
                { data: 'action', name: 'action' },
            ]
        });


        //Action Delete function
        $(document).on('click','.delete',function(){
            var id =  $(this).attr('id');
            swalWithBootstrapButtons({
                title: "Delete Selected Book?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                reverseButtons: true
            }).then(result => {
                if (result.value) {
                $.ajax({
                    url: "book/"+id,
                    type:"post",
                    data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                    success: function(result){
                        location.reload();
                        toast({
                            type: "success",
                            title: "Book Deleted Successfully"
                        });
                    }
                });
                }
            });
        });

        $('.select2').select2({
            placeholder: 'Choose one',
            searchInputPlaceholder: 'Search options'
        });

        });
    </script>

@endsection
