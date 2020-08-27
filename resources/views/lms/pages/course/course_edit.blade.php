
@extends('lms.layout.admin')

@section('title','Edit Course')


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
          <li class="breadcrumb-item"><a href="{{route('course.index')}}">Courses</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="">
    <h4>Edit Course ({{$course->name}})</h4>

    <div class="mg-t-50">
      <form method="post" action="{{route('course.update',$course->id)}}">
        @csrf
        {{method_field('PUT')}}

        <div class="form-group">
            <label class="d-block"><b>Course Name</b></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{$course->name}}{{old('name')}}">
            @error('name')
                <span class="" role="alert">
                <strong><i>{{ $message }}</i></strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="d-block"><b>Course Description</b></label>
            <textarea class="form-control" name="description" id="" cols="30" rows="5">{{$course->description}}{{old('description')}}</textarea>
        </div>


        <!--Lessons-->
        <div class="form-group">
            <label for="formGroupExampleInput2" class="d-block" style="font-weight:600">Lessons</label>
            <div data-label="Example" class="">
                <select class="form-control select2" multiple="multiple" name="lessons[]" multiple="">
                <option label="Choose Course(s)"></option>
                @foreach($lessons as $lesson)
                    <option value="{{$lesson->id}}"
                        @foreach($course->lessons as $lsn)
                            @if($lsn->id == $lesson->id)
                                selected
                            @endif
                        @endforeach
                    >{{$lesson->title}}</option>
                @endforeach
                </select>
            </div><!-- df-example -->
        </div>

        <div class="form-group">
            <label class="d-block"><b>Course Status</b></label>
            <select name="status" id="" class="form-control col-md-2">
                <option value="0" {{$course->status == '0' ? 'selected' : null}} selected>Draft</option>
                <option value="1" {{$course->status == '1' ? 'selected' : null}}>Publish</option>
            </select>
        </div>


        <button class="btn btn-primary btn-xs" id="btnpublish">Update</button>
        <a href="{{route('course.index')}}" class="btn btn-dark btn-xs">Cancel</a>


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
    $(function(){
        'use strict'


        $('.select2').select2({
            placeholder: 'Choose one',
            searchInputPlaceholder: 'Search options'
        });

    });
    </script>

@endsection
