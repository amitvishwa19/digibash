
@extends('lms.layout.admin')

@section('title','Add Question')


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
            <li class="breadcrumb-item active" aria-current="page">Question</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">
      <h4>Add New Question</h4>

      <div class="mg-t-50">
        <form method="post" action="{{route('question.store')}}">
          @csrf

            <div class="form-group">
                <label class="d-block"><b>Question</b></label>
                <textarea name="question" class="form-control @error('question') is-invalid @enderror" cols="30" rows="2">{{old('question')}}</textarea>
                @error('question')
                    <span class="" role="alert">
                        <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="d-block"><b>Question Score</b></label>
                <input type="text" class="form-control col-md-2 @error('score') is-invalid @enderror"  name="score" value="{{old('score',1)}}">
                @error('score')
                    <span class="" role="alert">
                        <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="d-block"><b>Question Type</b></label>
                <select name="type" class="form-control col-md-2 @error('type') is-invalid @enderror">
                    <option value="objective">Objective</option>
                    <option value="descriptive">Descriptive</option>
                </select>
                @error('type')
                    <span class="" role="alert">
                        <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="d-block"><b>Status</b></label>
                <select name="status" class="form-control col-md-2">
                    <option value="0">Draft</option>
                    <option value="1">Published</option>
                </select>
            </div>

            <hr>

            <div class="options">
                @for($question = 1; $question <=4; $question++)

                    <div class="form-group">
                        <label class="d-block"><b>Option {{$question}}</b></label>
                        <textarea name="option_text_{{$question}}" class="form-control @error('option_text') is-invalid @enderror" cols="30" rows="2">{{old('option_text')}}</textarea>
                        @error('option_text_{{$question}}')
                            <span class="" role="alert">
                                <strong><i>{{ $message }}</i></strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2" class="d-block">Is Correct?</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="customCheck{{$question}}" name="correct_{{$question}}" class="custom-control-input">
                            <label for="customCheck{{$question}}" class="custom-control-label">Is Correct?</label>
                        </div>
                    </div>

                    <hr>

                @endfor

            </div>

          <button class="btn btn-primary btn-xs" id="btnpublish">Save</button>
          <a href="{{route('question.index')}}" class="btn btn-dark btn-xs">Cancel</a>


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
