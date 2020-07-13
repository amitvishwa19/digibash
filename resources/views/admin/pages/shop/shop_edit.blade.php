
@extends('admin.layout.admin')

@section('title','Edit Shop')


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
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="">
    <h4>Edit Shop ({{$shop->name}})</h4>

    <div class="mg-t-50">
      <form method="post" action="{{route('shop.update',$shop->id)}}">
        @csrf
        {{method_field('PUT')}}

        <div class=" form-group">
            <label class="d-block"><b>Shop Name</b></label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name" value="{{$shop->name}}{{old('name')}}">
            @error('name')
                <span class="" role="alert">
                   <strong><i>{{ $message }}</i></strong>
                </span>
             @enderror
        </div>

        <div class=" form-group">
          <label class="d-block"><b>Shop Description</b></label>
          <textarea  class="form-control @error('name') is-invalid @enderror"  name="description" cols="30" rows="5">{{$shop->description}}{{old('description')}}</textarea>
          @error('description')
              <span class="" role="alert">
                 <strong><i>{{ $message }}</i></strong>
              </span>
           @enderror
        </div>

        @can('activate_shop')
        <div class=" form-group">
            <label class="d-block"><b>Shop Status</b></label>
            <select name="status" id="" class="form-control col-2 @error('name') is-invalid @enderror">
                <option value="enabled" {{$shop->status == 'enabled' ? 'selected' : null}}>Enabled</option>
                <option value="disabled" {{$shop->status == 'disabled' ? 'selected' : null}}>Disabled</option>
            </select>
        </div>
        @endcan

        <button class="btn btn-primary btn-xs" id="btnpublish">Update</button>
        <a href="{{route('shop.index')}}" class="btn btn-dark btn-xs">Cancel</a>


      </form>
    </div>


  </div><!-- row -->

</div>

</div>

@endsection


@section('modal')



@endsection


@section('javascript')


  	<script>

  	</script>

@endsection
