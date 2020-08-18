
@extends('admin.layout.admin')

@section('title','Add Section')


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
            <li class="breadcrumb-item"><a href="{{route('section.index')}}">Sections</a></li>
            <li class="breadcrumb-item active" aria-current="page">Section</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">
      <h4>Add New Section</h4>

      <div class="mg-t-50">
        <form method="post" action="{{route('section.store')}}">
          @csrf

            <div class="form-group">
                <label class="d-block"><b>Section Name</b></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{old('name')}}">
                @error('name')
                    <span class="" role="alert">
                        <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="d-block"><b>Section Description</b></label>
                <textarea class="form-control" name="description" id="" cols="30" rows="5">{{old('description')}}</textarea>
            </div>

            {{-- Roles --}}
            {{-- <div class="form-group">
                <label class="d-block"><b>Courses</b></label>
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-2">
                            <input type="checkbox" value="{{$course->id}}" name="courses[]">
                            <label for="roles" class="mg-l-5">{{$course->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div> --}}

            <!--Cources-->
            <div class="form-group">
                <label for="formGroupExampleInput2" class="d-block" style="font-weight:600">Courses</label>
                <div data-label="Example" class="">
                    <select class="form-control select2" multiple="multiple" name="courses[]" multiple="">
                    <option label="Choose Course(s)"></option>
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                    </select>
                </div><!-- df-example -->
            </div>

            <!--teachers-->
            <div class="form-group">
                <label for="formGroupExampleInput2" class="d-block" style="font-weight:600">Teachers</label>
                <div data-label="Example" class="">
                    <select class="form-control select2" multiple="multiple" name="roles[]" multiple="">
                    <option label="Choose Teacher(s)"></option>
                    @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->user->firstname}},{{$teacher->user->lastname}}</option>
                    @endforeach
                    </select>
                </div><!-- df-example -->
            </div>

            <div class="form-group">
                <label class="d-block"><b>Section Status</b></label>
                <select name="status" id="" class="form-control col-md-2">
                    <option value="1">Active</option>
                    <option value="0" selected>InActive</option>
                </select>
            </div>


          <button class="btn btn-primary btn-xs" id="btnpublish">Save</button>
          <a href="{{route('section.index')}}" class="btn btn-dark btn-xs">Cancel</a>


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
