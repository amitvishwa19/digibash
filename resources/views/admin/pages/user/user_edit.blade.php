
@extends('admin.layout.admin')

@section('title','Edit User')


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
          <li class="breadcrumb-item active" aria-current="page">User</li>
        </ol>
      </nav>
    </div> 
  </div>

  <div class="">
    <h4>Edit User ({{$user->name}})</h4>

    <div class="mg-t-50">
      <form method="post" action="{{route('user.update',$user->id)}}">
        @csrf
        {{method_field('PUT')}}

        <div class="wpinput form-group">
            <label class="d-block"><b>Example Title</b></label>
            <input type="text" class="form-control"  name="name" value="{{$user->name}}{{old('name')}}">
        </div>

        <!-- Email -->
        <div class="wpinput form-group">
            <label class="d-block"><b>User Email</b></label>
            <input type="email" class="form-control"  name="email" value="{{$user->email}}{{old('email')}}">
        </div>

        <!--Roles-->
        <div class="form-group">
          <label for="formGroupExampleInput2" class="d-block" style="font-weight:600">Roles</label>
          <div data-label="Example" class="">
              <select class="form-control select2" multiple="multiple" name="roles[]" multiple="">
                <option label="Choose one"></option>
                @foreach($roles as $role)
                  <option value="{{$role->name}}"
                    @foreach($user->roles as $rl)
                      @if($rl->id == $role->id)
                        selected
                      @endif
                    @endforeach
                    >{{$role->name}}
                  </option>
                @endforeach
              </select> 
          </div><!-- df-example -->
        </div>

    
        <button class="btn btn-primary btn-xs" id="btnpublish">Update</button>
        <a href="{{route('user.index')}}" class="btn btn-dark btn-xs">Cancel</a>


      </form>  
    </div>


  </div><!-- row -->

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