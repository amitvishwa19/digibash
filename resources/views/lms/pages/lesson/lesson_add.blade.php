
@extends('lms.layout.admin')

@section('title','Add Lesson')


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
            <li class="breadcrumb-item"><a href="{{route('lesson.index')}}">Lessons</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lesson</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">
      <h4>Add New Lesson</h4>

      <div class="mg-t-50">
        <form method="post" action="{{route('lesson.store')}}">
            @csrf

            <!--Cources-->
            <div class="form-group">
                <label for="formGroupExampleInput2" class="d-block" style="font-weight:600">Courses (Optional)</label>
                <div data-label="Example" class="">
                    <select class="form-control select2" multiple="multiple" name="courses[]" multiple="">
                    <option label="Choose Course(s)"></option>
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                    </select>
                </div><!-- df-example -->
                @error('courses')
                    <span class="" role="alert">
                        <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>

            <!--Exams-->
            <div class="form-group">
                <label for="formGroupExampleInput2" class="d-block" style="font-weight:600">Exams (Optional)</label>
                <div data-label="Example" class="">
                    <select class="form-control select2" multiple="multiple" name="exams[]" multiple="">
                    <option label="Choose Exam(s)"></option>
                    @foreach($exams as $exam)
                        <option value="{{$exam->id}}">{{$exam->title}}</option>
                    @endforeach
                    </select>
                </div><!-- df-example -->
                @error('exams')
                    <span class="" role="alert">
                        <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="d-block"><b>Lesson Title</b></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" value="{{old('title')}}">
                @error('title')
                    <span class="" role="alert">
                        <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="d-block"><b>Lesson Description</b></label>
                <textarea class="form-control" name="description" id="" cols="30" rows="5">{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <label class="d-block"><b>Lesson Content</b></label>
                <textarea class="form-control" name="content" id="" cols="30" rows="20">{{old('content')}}</textarea>
            </div>

            <div class="form-group">
                <label class="d-block"><b>Author</b></label>
                <input type="text" class="form-control col-md-4 @error('author') is-invalid @enderror"  name="author" value="{{old('author')}}">
                @error('author')
                    <span class="" role="alert">
                        <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2" class="d-block">Free Lesson</label>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" id="customCheck" name="free" class="custom-control-input">
                    <label for="customCheck" class="custom-control-label">Is Lesson Free?</label>
                </div>
            </div>

            <div class="form-group">
                <label class="d-block"><b>Lesson Price</b></label>
                <input type="text" class="form-control col-md-4 @error('price') is-invalid @enderror"  name="price" value="{{old('price')}}">
            </div>

            <div class="form-group">
                <label class="d-block"><b>Status</b></label>
                <select name="status" class="form-control col-md-2">
                    <option value="0">Draft</option>
                    <option value="1">Publish</option>
                </select>
            </div>



            <button class="btn btn-primary btn-xs" id="btnpublish">Save</button>
            <a href="{{route('lesson.index')}}" class="btn btn-dark btn-xs">Cancel</a>

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
        $(function(){
            'use strict'


            $('.select2').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search options'
            });

        });
  	</script>
@endsection
