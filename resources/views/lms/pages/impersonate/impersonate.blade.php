
@extends('lms.layout.admin')

@section('title','Impersonate')

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
            <li class="breadcrumb-item active" aria-current="page">Impersonate</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">

      <div class="d-flex mg-b-20">
        <h4>Impersonate User</h4>
      </div>


      <div class="mg-t-20">
        <div data-label="Example" class="mg-t-15">
            <table id="datatable" class="table table-color-primary">
              <thead>
              <tr style="padding-left:20px">
                  <th style="width:50%" class=""><b>Name</b></th>
                  <th style="width:30`%" class=""><b>Role</b></th>
                  <th style="width:20%" class=""><b>Actions</b></th>
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
        ajax: '{!! route('impersonate.index') !!}',
        columns:[
            { data: 'name', name: 'name'},
            { data: 'roles', name: 'roles' },
            { data: 'action', name: 'action' },
        ]
      });


      //Action Delete function
      $(document).on('click','.delete',function(){
        var id =  $(this).attr('id');
        swalWithBootstrapButtons({
            title: "Delete Selected Impersonate?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            reverseButtons: true
        }).then(result => {
            if (result.value) {
              $.ajax({
                  url: "impersonate/"+id,
                  type:"post",
                  data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                  success: function(result){
                    location.reload();
                    toast({
                        type: "success",
                        title: "Impersonate Deleted Successfully"
                    });
                  }
              });
            }
        });
      });


    });
  </script>

@endsection
