
@extends('admin.layout.admin')

@section('title','Edit Permission')


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
          <li class="breadcrumb-item active" aria-current="page">Permission</li>
        </ol>
      </nav>
    </div> 
  </div>

  <div class="">
    <h4>Edit Permission ({{$permission->name}})</h4>

    <div class="mg-t-50">
      <form method="post" action="{{route('permission.update',$permission->id)}}">
        @csrf
        {{method_field('PUT')}}

        <div class="wpinput form-group">
            <label class="d-block"><b>Example Title</b></label>
            <input type="text" class="form-control"  name="name" value="{{$permission->name}}{{old('name')}}">
        </div>

        <div class="wpinput form-group">
            <label class="d-block"><b>Permission Description</b></label>
            <textarea class="form-control" name="description" id="" cols="30" rows="5">{{$permission->description}}{{old('description')}}</textarea>
        </div>

    
        <button class="btn btn-primary btn-xs" id="btnpublish">Update</button>
        <a href="{{route('permission.index')}}" class="btn btn-dark btn-xs">Cancel</a>


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