
@extends('admin.layout.admin')

@section('title','Edit IssuedBook')


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
          <li class="breadcrumb-item"><a href="{{route('issuedbook.index')}}">IssuedBooks</a></li>
          <li class="breadcrumb-item active" aria-current="page">Return</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="">
    <h4>Return Book ({{$issuedbook->book->title}})</h4>

    <div class="mg-t-50">
      <form method="post" action="{{route('issuedbook.update',$issuedbook->id)}}">
        @csrf
        {{method_field('PUT')}}

        <div class="form-group">
            <label class="d-block"><b>Book Title</b></label>
            <input type="text" class="form-control"  name="title" value="{{$issuedbook->book->title}}" disabled>
        </div>

        <div class="form-group">
            <label class="d-block"><b>Book Description</b></label>
            <textarea name="description" class="form-control" cols="30" rows="4" disabled>{{$issuedbook->book->description}}</textarea>
        </div>

        <div class="form-group">
            <label class="d-block"><b>Due Date</b></label>
            <input type="text" class="form-control col-md-2"  name="return_date" value="{{$issuedbook->due_date}}" disabled>
        </div>

        <div class="form-group">
            <label class="d-block"><b>Overdue Days</b></label>
            <input type="text" class="form-control col-md-2"  name="overdue" value="{{(\Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$issuedbook->due_date))->diffInDays(\Carbon\Carbon:: now())}}" disabled>
        </div>

        <div class="form-group">
            <label class="d-block"><b>Fine</b></label>
            <input type="text" class="form-control  col-md-2"  name="fine" value="{{$issuedbook->fine}}">
        </div>


        <button class="btn btn-primary btn-xs" id="btnpublish">Return</button>
        <a href="{{route('issuedbook.index')}}" class="btn btn-dark btn-xs">Cancel</a>


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
