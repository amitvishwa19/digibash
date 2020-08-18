
@extends('admin.layout.admin')

@section('title','Add Course')


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
            <li class="breadcrumb-item"><a href="{{route('course.index')}}">Courses</a></li>
            <li class="breadcrumb-item active" aria-current="page">Course</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">
      <h4>Add New Course</h4>

      <div class="mg-t-50">
        <form method="post" action="{{route('course.store')}}">
          @csrf

            <div class="form-group">
                <label class="d-block"><b>Course Name</b></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{old('name')}}">
                @error('name')
                    <span class="" role="alert">
                    <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="d-block"><b>Course Description</b></label>
                <textarea class="form-control" name="description" id="" cols="30" rows="5">{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <label class="d-block"><b>Course Status</b></label>
                <select name="status" id="" class="form-control col-md-2">
                    <option value="1">Active</option>
                    <option value="0" selected>InActive</option>
                </select>
            </div>


          <button class="btn btn-primary btn-xs" id="btnpublish">Save</button>
          <a href="{{route('course.index')}}" class="btn btn-dark btn-xs">Cancel</a>


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
