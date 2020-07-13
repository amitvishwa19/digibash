
@extends('admin.layout.admin')

@section('title','Add Permission')


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
            <li class="breadcrumb-item"><a href="{{route('permission.index')}}">Permissions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Permission</li>
          </ol>
        </nav>
      </div> 
    </div>

    <div class="">
      <h4>Add New Permission</h4>

      <div class="mg-t-50">
        <form method="post" action="{{route('permission.store')}}">
          @csrf

          <div class="wpinput form-group">
              <label class="d-block"><b>Permission Name</b></label>
              <input type="text" class="form-control"  name="name" value="{{old('name')}}">
              @if($errors->has('name'))
                  <p class="help-block">
                    <small><i>{{ $errors->first('name') }}</i></small>
                  </p>
              @endif
          </div>

          <div class="wpinput form-group">
              <label class="d-block"><b>Permission Description</b></label>
              <textarea class="form-control" name="description" id="" cols="30" rows="5">{{old('description')}}</textarea>
          </div>

      
          <button class="btn btn-primary btn-xs" id="btnpublish">Save</button>
          <a href="{{route('permission.index')}}" class="btn btn-dark btn-xs">Cancel</a>


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
  		
  	</script>

@endsection