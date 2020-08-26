
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
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="">
    <h4>Edit Question ({{$question->question}})</h4>

    <div class="mg-t-50">
      <form method="post" action="{{route('question.update',$question->id)}}">
        @csrf
        {{method_field('PUT')}}

        <div class="form-group">
            <label class="d-block"><b>Question</b></label>
            <textarea name="question" class="form-control @error('question') is-invalid @enderror" cols="30" rows="2">{{$question->question}}{{old('question')}}</textarea>
            @error('question')
                <span class="" role="alert">
                    <strong><i>{{ $message }}</i></strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="d-block"><b>Question Score</b></label>
            <input type="text" class="form-control col-md-2 @error('score') is-invalid @enderror"  name="score" value="{{$question->score}}{{old('score')}}">
            @error('score')
                <span class="" role="alert">
                    <strong><i>{{ $message }}</i></strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="d-block"><b>Question Type</b></label>
            <select name="type" class="form-control col-md-2 @error('type') is-invalid @enderror">
                <option value="objective" {{$question->type == 'objective' ? 'selected' : null}}>Objective</option>
                <option value="descriptive" {{$question->type == 'descriptive' ? 'selected' : null}}>Descriptive</option>
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
                <option value="0" {{$question->status == 0 ? 'selected' : null}}>Draft</option>
                <option value="1" {{$question->status == 1 ? 'selected' : null}}>Published</option>
            </select>
        </div>

        <hr>

        <div class="options">
            @foreach($questionOptions as $key => $qo)

                <input type="hidden" name="option_id_{{$loop->iteration}}" value="{{$qo->id}}">
                <div class="form-group">
                    <label class="d-block"><b>Option {{$loop->iteration}}</b></label>
                    <textarea name="option_text_{{$loop->iteration}}" class="form-control @error('option_text') is-invalid @enderror" cols="30" rows="2">{{$qo->option_text}}{{old('option_text')}}</textarea>
                    @error('option_text_{{$loop->iteration}}')
                        <span class="" role="alert">
                            <strong><i>{{ $message }}</i></strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2" class="d-block">Is Correct?</label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="customCheck{{$loop->iteration}}" name="correct_{{$loop->iteration}}" class="custom-control-input" {{$qo->correct == 1 ? 'checked' : null}}>
                        <label for="customCheck{{$loop->iteration}}" class="custom-control-label">Is Correct?</label>
                    </div>
                </div>

                <hr>

            @endforeach


        </div>


        <button class="btn btn-primary btn-xs" id="btnpublish">Update</button>
        <a href="{{route('question.index')}}" class="btn btn-dark btn-xs">Cancel</a>


      </form>
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
