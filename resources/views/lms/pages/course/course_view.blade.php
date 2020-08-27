
@extends('lms.layout.admin')

@section('title','Course Lessons')

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
            <li class="breadcrumb-item active" aria-current="page">Lessons</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">

        <div class="d-flex mg-b-20">
            <h4>Course</h4>
        </div>


        <div class="mg-t-20">

            <div class="card mg-b-20 mg-lg-b-25">
                <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                    <h6 class="tx-uppercase tx-semibold mg-b-0">{{ $course->name }}</h6>
                </div><!-- card-header -->
                <div class="card-body pd-25">
                    <div class="media d-block d-sm-flex">
                        <div class="wd-80 ht-80 bg-ui-04 rounded d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase tx-white-7 wd-40 ht-40"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        </div>
                        <div class="media-body pd-t-25 pd-sm-t-0 pd-sm-l-25">
                            <span class="d-block tx-13 tx-color-03">{{ $course->created_at->diffForHumans() }}</span>
                            <p class="mg-b-3 tx-color-02">{{ $course->description }}</p>

                                <h5 class="mg-t-20">Lessons</h5>
                                @if($course->lessons->count() >= 1)
                                    <ul class="pd-l-10 mg-0 tx-13">
                                        @foreach($course->lessons as $lesson)
                                            <li><a href="{{route('lesson.show',$lesson->id)}}">{{ $lesson->title }}</a></li>
                                        @endforeach
                                    </ul>
                                @else
                                    <small>No lessons found for this course</small>
                                @endif

                        </div>
                    </div><!-- media -->
                </div>
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

        $('#accordion1').accordion({
            heightStyle: 'content'
        });


    });
  </script>

@endsection
