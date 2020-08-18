
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
    <h4>Edit User ({{$user->firstname}},{{$user->lastname}})</h4>

    <div class="mg-t-50">
      <form method="post" action="{{route('user.update',$user->id)}}">
        @csrf
        {{method_field('PUT')}}

        <!-- Firstname -->
        <div class="form-group">
            <label class="d-block"><b>User Firstname</b></label>
            <input type="text" class="form-control"  name="firstname" value="{{$user->firstname}}{{old('firstname')}}">
        </div>

        <!-- Lastname -->
        <div class="form-group">
            <label class="d-block"><b>User Lastname</b></label>
            <input type="text" class="form-control"  name="lastname" value="{{$user->lastname}}{{old('lastname')}}">
        </div>

        <!-- Email -->
        <div class="form-group">
            <label class="d-block"><b>User Email</b></label>
            <input type="email" class="form-control"  name="email" value="{{$user->email}}{{old('email')}}">
        </div>

        <!-- Type -->
        <div class="form-group">
            <label class="d-block"><b>User Type</b></label>
            <input type="text" class="form-control"  name="type" value="{{$user->type}}{{old('type')}}">
        </div>

        <!-- Status -->
        <div class="form-group">
            <label class="d-block"><b>Status</b></label>
            <select name="status" id="" class="form-control col-md-2">
                <option value="1" {{$user->status == '1' ? 'selected' : null}}>Active</option>
                <option value="0" {{$user->status == '0' ? 'selected' : null}}>InActive</option>
            </select>
        </div>


        <div class="form-group">
            <label class="d-block"><b>Roles</b></label>
            <div class="row">
                @foreach($roles as $role)
                    <div class="col-3">
                        <input type="checkbox" value="{{$role->id}}" name="roles[]"
                        @foreach($user->roles as $rl)
                            @if($rl->id == $role->id)
                                checked
                            @endif
                        @endforeach
                        >
                        <label for="roles" class="mg-l-5">{{$role->name}}</label>
                    </div>
                @endforeach
            </div>
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
