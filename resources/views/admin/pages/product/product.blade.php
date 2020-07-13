
@extends('admin.layout.admin')

@section('title','Product')

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
            <li class="breadcrumb-item active" aria-current="page">Product</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">

      <div class="d-flex mg-b-20">
        <h4>Products</h4>
        <a href="{{route('product.create')}}" class="btn btn-primary btn-xs mg-l-10">Add New Product</a>
      </div>


      <div class="mg-t-20">
        <div data-label="Example" class="mg-t-15">
            <table id="datatable" class="table table-color-primary">
              <thead>
                <tr >
                    <th style="" class=""><b>Product</b></th>
                    <th style="" class=""><b>Categories</b></th>
                    <th style="" class=""><b>Shop</b></th>
                    <th style="" class=""><b>Stock</b></th>
                    <th style="" class=""><b>Price</b></th>
                    <th style="" class=""><b>Discount</b></th>
                    <th style="" class=""><b>Status</b></th>
                    <th style="" class=""><b>Created</b></th>
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
        ajax: '{!! route('product.index') !!}',
        columns:[
            { data: 'name', name: 'name'},
            { data: 'categories', name: 'categories'},
            { data: 'shop', name: 'shop'},
            { data: 'stock', name: 'stock'},
            { data: 'price', name: 'price'},
            { data: 'discount', name: 'discount'},
            { data: 'status', name: 'status'},
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' },
        ]
      });


      //Action Delete function
      $(document).on('click','.delete',function(){
        var id =  $(this).attr('id');
        swalWithBootstrapButtons({
            title: "Delete Selected Product?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            reverseButtons: true
        }).then(result => {
            if (result.value) {
              $.ajax({
                  url: "product/"+id,
                  type:"post",
                  data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                  success: function(result){
                    location.reload();
                    toast({
                        type: "success",
                        title: "Product Deleted Successfully"
                    });
                  }
              });
            }
        });
      });


    });
  </script>

@endsection
