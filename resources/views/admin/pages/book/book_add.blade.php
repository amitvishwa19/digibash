
@extends('admin.layout.admin')

@section('title','Add Book')


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
            <li class="breadcrumb-item"><a href="{{route('book.index')}}">Books</a></li>
            <li class="breadcrumb-item active" aria-current="page">Book</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">
      <h4>Add New Book</h4>

      <div class="mg-t-50">
        <form method="post" action="{{route('book.store')}}">
          @csrf

          <div class="form-group">
            <label class="d-block"><b>Book Title</b></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title" value="{{old('title')}}">
            @error('title')
               <span class="" role="alert">
                  <strong><i>{{ $message }}</i></strong>
               </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="d-block"><b>Book Description</b></label>
            <textarea name="description" class="form-control" cols="30" rows="5">{{old('description')}}</textarea>
            @error('description')
               <span class="" role="alert">
                  <strong><i>{{ $message }}</i></strong>
               </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="d-block"><b>Book Author</b></label>
            <input type="text" class="form-control col-md-4 @error('author') is-invalid @enderror"  name="author" value="{{old('author')}}">
            @error('author')
               <span class="" role="alert">
                  <strong><i>{{ $message }}</i></strong>
               </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="d-block"><b>Book Type</b></label>
            <input type="text" class="form-control col-md-4 @error('type') is-invalid @enderror"  name="type" value="{{old('type')}}">
            @error('type')
               <span class="" role="alert">
                  <strong><i>{{ $message }}</i></strong>
               </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="d-block"><b>Quantity</b></label>
            <input type="number" class="form-control col-md-4 @error('quantity') is-invalid @enderror"  name="quantity" value="{{old('quantity')}}">
            @error('quantity')
               <span class="" role="alert">
                  <strong><i>{{ $message }}</i></strong>
               </span>
            @enderror
        </div>


            <button class="btn btn-primary btn-xs" id="btnpublish">Save</button>
            <a href="{{route('book.index')}}" class="btn btn-dark btn-xs">Cancel</a>


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
