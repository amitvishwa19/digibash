
@extends('admin.layout.admin')

@section('title','Add User')


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
            <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">User</li>
          </ol>
        </nav>
      </div> 
    </div>

    <div class="">
      <h4>Add New User</h4>

      <div class="mg-t-50">
        <form method="post" action="{{route('user.store')}}">
          @csrf

          <!-- Name -->
          <div class="wpinput form-group">
              <label class="d-block"><b>User Name</b></label>
              <input type="text" class="form-control"  name="name" value="{{old('name')}}">
          </div>

          <!-- Email -->
          <div class="wpinput form-group">
              <label class="d-block"><b>User Email</b></label>
              <input type="email" class="form-control"  name="email" value="{{old('email')}}">
          </div>

          <!--Permissions-->
          <div class="form-group">
            <label for="formGroupExampleInput2" class="d-block" style="font-weight:600">Roles</label>
            <div data-label="Example" class="">
                <select class="form-control select2" multiple="multiple" name="roles[]" multiple="">
                  <option label="Choose one"></option>
                  @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
                </select> 
            </div><!-- df-example -->
          </div>

      
          <button class="btn btn-primary btn-xs" id="btnpublish">Save</button>
          <a href="{{route('user.index')}}" class="btn btn-dark btn-xs">Cancel</a>


        </form>  
      </div>

    </div>

  </div>
  
</div>
	    
@endsection


@section('modal')

	

@endsection


@section('javascript')
  <script src="{{asset('public/admin/lib/select2/js/select2.min.js')}}"></script>
	
  	<script>
  		$('.select2').select2({
        placeholder: 'Choose one',
        searchInputPlaceholder: 'Search options'
      });
  	</script>

@endsection