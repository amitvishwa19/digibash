
@extends('lms.layout.admin')

@section('title','Course')

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
            <li class="breadcrumb-item"><a href="{{route('exam.index')}}">Exams</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$exam->title}}</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">

        <div class="d-flex mg-b-20">
            <h4>{{$exam->title}}</h4>
        </div>


        <div class="mg-t-20">

            @foreach($exam->questions as $question)

                <div class="card mg-b-20 mg-lg-b-25">

                    <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                        <h6 class=" tx-semibold mg-b-0">
                            {{$loop->iteration}} ) {{$question->question}}
                        </h6>
                    </div><!-- card-header -->

                    <div class="card-body pd-20 pd-lg-25">
                        @foreach($question->options as $option)
                            {{-- <ul>
                                <li>{{$option->option_text}}</li>
                            </ul> --}}
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio">{{$option->option_text}}</label>
                            </div>

                        @endforeach
                    </div>

                </div>

            @endforeach

        </div>

    </div><!-- row -->

  </div>

</div>

@endsection


@section('modal')



@endsection


@section('javascript')
  <script src="{{asset('public/admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>

  <script>
    $(function(){
      'use strict'




    });
  </script>

@endsection
