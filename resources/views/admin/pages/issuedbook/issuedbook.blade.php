
@extends('admin.layout.admin')

@section('title','IssuedBook')

@section('style')
@endsection


@section('content')

<div class="content-body " id="contentbody">

  <div class="card">

    <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{route('app.admin.home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">IssuedBook</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">

      <div class="mg-b-20">
        <div>
            <h4>IssuedBooks</h4>
        </div>
        <div>
            <a href="{{route('book.index',['status'=>'all'])}}" class="wp-title mg-r-5" id="select_all">All Books</a>
            <a href="{{route('issuedbook.create')}}" class="wp-title mg-r-5" id="select_all">Issue Books</a>
        </div>
      </div>


      <div class="mg-t-20">
        <div data-label="Example" class="mg-t-15">
            <table id="datatable" class="table table-color-primary">
              <thead>
              <tr style="padding-left:20px">
                  <th style="" class=""><b>Book Title</b></th>
                  <th style="" class=""><b>issued To</b></th>
                  <th style="" class=""><b>issue Date</b></th>
                  <th style="" class=""><b>Due Date</b></th>
                  <th style="" class=""><b>Return Status</b></th>
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

@endsection


@section('modal')



@endsection


@section('javascript')
  <script src="{{asset('public/admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>

  <script>
    $(function(){
      'use strict'


      //Datatable
      $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('issuedbook.index') !!}',
        columns:[
            { data: 'book_name', name: 'book_name'},
            { data: 'issued_to', name: 'issued_to'},
            { data: 'issued_on', name: 'issued_on'},
            { data: 'due_date', name: 'due_date'},
            { data: 'status', name: 'status'},
            { data: 'action', name: 'action' },
        ]
      });


      //Action Delete function
      $(document).on('click','.delete',function(){
        var id =  $(this).attr('id');
        swalWithBootstrapButtons({
            title: "Delete Selected IssuedBook?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            reverseButtons: true
        }).then(result => {
            if (result.value) {
              $.ajax({
                  url: "issuedbook/"+id,
                  type:"post",
                  data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                  success: function(result){
                    location.reload();
                    toast({
                        type: "success",
                        title: "IssuedBook Deleted Successfully"
                    });
                  }
              });
            }
        });
      });


    });
  </script>

@endsection
