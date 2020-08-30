
@extends('digishop.admin.layout.admin')

@section('title','Order')

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
            <li class="breadcrumb-item active" aria-current="page">Order</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">

      <div class="d-flex mg-b-20">
        <h4>Orders</h4>
      </div>

      <div class="row">
         <div class="col-xl-4 col-lg-6 info-widget">
            <div class="card l-bg-green">
                <div class="card-statistic-3 p-1">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-1">
                        <h5 class="card-title mb-0">Success Payments</h5>
                    </div>
                    <div class="row align-items-center mb-1 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0 \">
                                <i class="fa fa-inr mr-1" aria-hidden="true"></i> {{$success_orders}}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            {{-- <span>12.5% <i class="fa fa-arrow-up"></i></span> --}}
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
         </div>

         <div class="col-xl-4 col-lg-6 info-widget">
            <div class="card l-bg-orange">
                <div class="card-statistic-3 p-1">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-1">
                        <h5 class="card-title mb-0">Pending Payments</h5>
                    </div>
                    <div class="row align-items-center mb-1 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0 \">
                                <i class="fa fa-inr mr-1" aria-hidden="true"></i> {{$pending_orders}}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            {{-- <span>12.5% <i class="fa fa-arrow-up"></i></span> --}}
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
         </div>

         <div class="col-xl-4 col-lg-6 info-widget">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-1">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-1">
                        <h5 class="card-title mb-0">Fail Payments</h5>
                    </div>
                    <div class="row align-items-center mb-1 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0 \">
                                <i class="fa fa-inr mr-1" aria-hidden="true"></i> {{$fail_orders}}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            {{-- <span>12.5% <i class="fa fa-arrow-up"></i></span> --}}
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
         </div>
      </div>

      <div class="mg-t-20">
        <div data-label="Example" class="mg-t-15">
            <table id="datatable" class="table table-color-primary">
               <thead>
                  <tr style="padding-left:20px">
                     <th style="" class=""><b>Client</b></th>
                     <th style="" class=""><b>Gateway</b></th>
                     <th style="" class=""><b>Amount</b></th>
                     <th style="" class=""><b>Payment Id</b></th>
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
        ajax: '{!! route('order.index') !!}',
        columns:[
            { data: 'user', name: 'user'},
            { data: 'payment_gateway', name: 'payment_gateway'},
            { data: 'payment_amount', name: 'payment_amount'},
            { data: 'payment_id', name: 'payment_id'},
            { data: 'status', name: 'status'},
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action' },
        ]
      });


      //Action Delete function
      $(document).on('click','.delete',function(){
        var id =  $(this).attr('id');
        swalWithBootstrapButtons({
            title: "Delete Selected Order?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            reverseButtons: true
        }).then(result => {
            if (result.value) {
              $.ajax({
                  url: "order/"+id,
                  type:"post",
                  data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                  success: function(result){
                    location.reload();
                    toast({
                        type: "success",
                        title: "Order Deleted Successfully"
                    });
                  }
              });
            }
        });
      });


    });
  </script>

@endsection
