
@extends('lms.layout.admin')

@section('title','Edit Exam')


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
          <li class="breadcrumb-item"><a href="{{route('exam.index')}}">Exams</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="">
    <h4>Edit Exam ({{$exam->title}})</h4>

    <div class="mg-t-20">
      <form method="post" action="{{route('exam.update',$exam->id)}}">
        @csrf
        {{method_field('PUT')}}

        <div class="form-group">
            <label class="d-block"><b>Exam Title</b></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" value="{{$exam->title}}{{old('title')}}">
            @error('title')
                <span class="" role="alert">
                    <strong><i>{{ $message }}</i></strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="d-block"><b>Exam Description</b></label>
            <textarea name="description" class="form-control" cols="30" rows="4">{{$exam->title}}{{old('description')}}</textarea>
        </div>

        <div class="row">
            <div class="form-group  col-md-2">
                <label class="d-block"><b>Start Date</b></label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror"  name="start_date" value="{{$exam->start_date}}{{old('start_date')}}">
                @error('start_date')
                    <span class="" role="alert">
                        <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>

            <div class="form-group  col-md-2">
                <label class="d-block"><b>End Date</b></label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror"  name="end_date" value="{{$exam->end_date}}{{old('end_date')}}">
                @error('end_date')
                    <span class="" role="alert">
                        <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-md-2">
                <label class="d-block"><b>Exam Status</b></label>
                <select name="status" class="form-control">
                    <option value="0" {{$exam->status == 0 ? 'selected' : null}}>Draft</option>
                    <option value="1" {{$exam->status == 1 ? 'selected' : null}}>Published</option>
                </select>
                @error('end_date')
                    <span class="" role="alert">
                        <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>
        </div>

        <!--questions-->
        <div class="form-group">
            <label for="formGroupExampleInput2" class="d-block" style="font-weight:600">Questions</label>
            <div data-label="Example" class="">
                <select class="form-control select2" multiple="multiple" name="questions[]" multiple="">
                <option label="Choose Teacher(s)"></option>
                @foreach($questions as $questions)
                    <option value="{{$questions->id}}"
                        @foreach($exam->questions as $qs)
                            @if($qs->id == $questions->id)
                                selected
                            @endif
                        @endforeach
                    >{{$questions->question}}</option>
                @endforeach
                </select>
            </div><!-- df-example -->
        </div>


        <button class="btn btn-primary btn-xs" id="btnpublish">Update</button>
        <a href="{{route('exam.index')}}" class="btn btn-dark btn-xs">Cancel</a>


      </form>
    </div>


  </div><!-- row -->

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
