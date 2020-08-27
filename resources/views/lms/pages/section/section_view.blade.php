
@extends('lms.layout.admin')

@section('title','Section')

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
            <li class="breadcrumb-item"><a href="{{route('section.index')}}">Sections</a></li>
            <li class="breadcrumb-item active" aria-current="page">Section</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">

        <div class="d-flex mg-b-20">
            <h4>Section</h4>
        </div>


        <div class="mg-t-20">
            <div class="card mg-b-20 mg-lg-b-25">
                <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                  <h6 class="tx-uppercase tx-semibold mg-b-0">{{$section->name}}</h6>
                </div><!-- card-header -->
                <div class="card-body pd-20 pd-lg-25">

                    <p class="mg-b-20">{{$section->description}}</p>

                    <div class="bd bg-gray-50 pd-y-15 pd-x-15 pd-sm-x-20 mg-t-10">
                        <h6><strong>Courses</strong></h6>
                        <ul class="pd-l-10 mg-0 tx-13 mg-b-20">
                            @foreach($section->courses as $course)
                            <li><a href="{{route('course.show',$course->id)}}">{{$course->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="bd bg-gray-50 pd-y-15 pd-x-15 pd-sm-x-20 mg-t-10">
                        <h6><strong>Teachers</strong></h6>
                        <ul class="pd-l-10 mg-0 tx-13">
                            @foreach($section->teachers as $teacher)
                                <li><a href="{{route('teacher.show',$teacher->id)}}">{{$teacher->user->firstname}},{{$teacher->user->firstname}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="bd bg-gray-50 pd-y-15 pd-x-15 pd-sm-x-20 mg-t-10">
                        <h6><strong>Students</strong></h6>
                        <ul class="pd-l-10 mg-0 tx-13">
                            @foreach($section->students as $student)
                                <li><a href="{{route('student.show',$student->id)}}">{{$student->user->firstname}},{{$student->user->firstname}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                </div><!-- card-footer -->
            </div>
        </div>

    </div><!-- row -->

  </div>

</div>

@endsection


@section('modal')
@endsection


@section('javascript')


  <script>
    $(function(){
      'use strict'

  </script>

@endsection
