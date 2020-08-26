
@extends('admin.layout.admin')

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
        <h4>Course Lessons</h4>
      </div>


      <div class="mg-t-20">
            <div id="accordion1" class="accordion ui-accordion ui-widget ui-helper-reset" role="tablist">
                @foreach($lessons as $lesson)
                    <h6 class="accordion-title ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-collapsed ui-corner-all" role="tab" id="ui-id-1" aria-controls="ui-id-2" aria-selected="false" aria-expanded="false" tabindex="-1">
                        <span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
                        <strong>{{$lesson->title}}</strong> ( <small>by <strong>{{$lesson->author}}</strong> at <strong>{{$lesson->created_at->diffForHumans()}}</strong></small> )
                    </h6>
                    <div class="accordion-body ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-2" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="true" style="display: none;">
                        <b>Description</b>
                        <p>{{$lesson->description}}</p>
                        <hr>
                        <b>Content</b>
                        <p>{{$lesson->content}}</p>
                    </div>
                @endforeach
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
