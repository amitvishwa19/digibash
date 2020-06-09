
@extends('admin.layout.admin')

@section('title','Menu')


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
            <li class="breadcrumb-item"><a href="{{route('menu.index')}}">Menu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
      </div> 
    </div>

    <div class="">
      <h4>Edit Menu</h4>

      <div class="mg-t-50">
        <form method="POST" action="{{route('menu.update', $menu->id)}}">
          @csrf
          {{method_field('PUT')}}
          <div class="form-group">
            <label class="d-block">Menu Name</label>
            <input type="text" class="form-control" placeholder="Menu Name" name="name" value="{{$menu->name}}{{old('name')}}">
          </div>
          <button class="btn btn-primary btn-xs">Update</button>
          <a href="{{route('menu.index')}}" class="btn btn-dark btn-xs">Cancel</a>
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