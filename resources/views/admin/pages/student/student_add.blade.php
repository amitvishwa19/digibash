
@extends('admin.layout.admin')

@section('title','Add Student')


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
            <li class="breadcrumb-item"><a href="{{route('student.index')}}">Students</a></li>
            <li class="breadcrumb-item active" aria-current="page">Student</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">
      <h4>Add New Student</h4>

      <div class="mg-t-50">
         <form method="post" action="{{route('student.store')}}">
            @csrf

            <div class="row">

                <div class="form-group col-md-3 col-xs-12">
                    <label class="d-block"><b>First Name</b></label>
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror"  name="firstname" value="{{old('firstname')}}">
                    @error('firstname')
                        <span class="" role="alert">
                            <strong><i>{{ $message }}</i></strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-3 col-xs-12">
                    <label class="d-block"><b>Last Name</b></label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror"  name="lastname" value="{{old('lastname')}}">
                    @error('lastname')
                        <span class="" role="alert">
                            <strong><i>{{ $message }}</i></strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-3 col-xs-12">
                    <label class="d-block"><b>Email</b></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{old('email')}}">
                    @error('email')
                        <span class="" role="alert">
                            <strong><i>{{ $message }}</i></strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-3 col-xs-12">
                    <label class="d-block"><b>Mobile</b></label>
                    <input type="text" class="form-control @error('mobile') is-invalid @enderror"  name="mobile" value="{{old('mobile')}}">
                    @error('mobile')
                        <span class="" role="alert">
                            <strong><i>{{ $message }}</i></strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-3 col-xs-12">
                    <label class="d-block"><b>Section</b></label>
                    <select name="section" class="form-control @error('section') is-invalid @enderror">
                        <option  disabled selected>---- Select Section ----</option>
                        @foreach($sections as $section)
                            <option value="{{$section->id}}">{{$section->name}}</option>
                        @endforeach
                    </select>
                    @error('section')
                        <span class="" role="alert">
                            <strong><i>{{ $message }}</i></strong>
                        </span>
                    @enderror
                </div>

            </div>


            <button class="btn btn-primary btn-xs" id="btnpublish">Save</button>
            <a href="{{route('student.index')}}" class="btn btn-dark btn-xs">Cancel</a>


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
