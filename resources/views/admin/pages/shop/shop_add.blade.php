
@extends('admin.layout.admin')

@section('title','Add Shop')


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
            <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Shops</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">
      <h4>Add New Shop</h4>

      <div class="mg-t-50">
        <form method="post" action="{{route('shop.store')}}">
          @csrf

          <div class="form-group">
              <label class="d-block"><b>Shop Name</b></label>
              <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{old('name')}}">
              @error('name')
                  <span class="invalid-feedback" role="alert">
                     <strong><i>{{ $message }}</i></strong>
                  </span>
               @enderror
          </div>

          <div class="form-group">
            <label class="d-block"><b>Shop Description</b></label>
            <textarea  class="form-control"  name="description" cols="30" rows="5">{{old('description')}}</textarea>
          </div>

          @can('activate_shop')
          <div class="form-group">
            <label class="d-block">Shop Status</label>
            <select name="status" class="form-control col-2">
                <option value="enabled">Enabled</option>
                <option value="disabled" selected>Disabled</option>
            </select>
          </div>
          @endcan


          <button class="btn btn-primary btn-xs" id="btnpublish">Save</button>
          <a href="{{route('shop.index')}}" class="btn btn-dark btn-xs">Cancel</a>


        </form>
      </div>

    </div>

  </div>

</div>

@endsection


@section('modal')



@endsection


@section('javascript')


  	<script>
        $(function(){
            'use strict'


        $('#customSwitch3').on('click',function(){
            if($('#customSwitch3').prop('checked')) {
                $('#stext').html('Enabled')
            } else {
                $('#stext').html('Disabled')
            }
        })






        });
  	</script>

@endsection
