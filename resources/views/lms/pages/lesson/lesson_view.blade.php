
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
            <li class="breadcrumb-item"><a href="{{route('lesson.index')}}">Lessons</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lesson</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">

        <div class="d-flex mg-b-20">
            <h4>Lesson</h4>
        </div>


        <div class="mg-t-20">
            <div class="card mg-b-20 mg-lg-b-25">
                <div class="card-header pd-y-10 pd-x-10 d-flex align-items-center justify-content-between">
                    <h6 class="tx-uppercase tx-semibold mg-b-0">{{ $lesson->title }}</h6>
                </div><!-- card-header -->
                <div class="card-body pd-25">
                  <div class="media d-block d-sm-flex">
                    <div class="avatar avatar-xl">
                        <img src="{{$lesson->feature_image}}" class="rounded" alt="">
                    </div>
                    <div class="media-body pd-t-25 pd-sm-t-0 pd-sm-l-25">
                        <span class="d-block tx-13 tx-color-03 mg-b-10">{{ $lesson->created_at->diffForHumans() }}</span>
                        <h5 class="mg-b-10">{{ $lesson->description }}</h5>
                        <p class="mg-b-3 tx-color-02">{{ $lesson->content }}</p>


                        <h5 class="mg-t-20">Exams</h5>
                        @if($lesson->exams->count() >= 1)
                        <ul class="pd-l-10 mg-0 tx-13">
                            @foreach($lesson->exams as $exam)
                                <li><a href="">{{$exam->title}}</a></li>
                            @endforeach
                        </ul>
                        @else
                            <small>No Exams found for this lessons</small>
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
