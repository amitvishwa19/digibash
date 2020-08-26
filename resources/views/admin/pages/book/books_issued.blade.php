
@extends('admin.layout.admin')

@section('title','Issued Books')

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
            <li class="breadcrumb-item"><a href="{{route('book.index')}}">Books</a></li>
            <li class="breadcrumb-item active" aria-current="page">Issued Book</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">

        <div class=" mg-b-20">
            <div class="d-flex">
                <h4>Issued Books</h4>
            </div>
        </div>


        <div class="mg-t-20">
            <div data-label="Example" class="mg-t-15">
                <table id="datatable" class="table table-color-primary">
                  <thead>
                  <tr style="padding-left:20px">
                      <th style="" class=""><b>BookID</b></th>

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
    <script src="{{asset('public/admin/lib/select2/js/select2.min.js')}}"></script>
    <script>
        $(function(){
        'use strict'


        //Datatable
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('book.issued') !!}',
            columns:[
                { data: 'book_id', name: 'book_id'},
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
