
@extends('lms.layout.admin')

@section('title','Edit Question')


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
          <li class="breadcrumb-item"><a href="{{route('question.index')}}">Questions</a></li>
          <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="">
    <h4>View Question ({{$question->question}})</h4>

    <div class="mg-t-50">
        <h4>{{$question->question}}</h4>
        @foreach($question->question_options as $option)
            <ul class="list-group col-md-4">
               <li class="list-group-item">
                @if($option->correct == 1)
                    <strong>{{$option->option_text}}</strong>
                @else
                    {{$option->option_text}}
                @endif
               </li>
            </ul>
        @endforeach
    </div>


  </div><!-- row -->

</div>

</div>

@endsection


@section('modal')



@endsection


@section('javascript')


  	<script>

  	</script>

@endsection
