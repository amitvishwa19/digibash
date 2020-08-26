
@extends('admin.layout.admin')

@section('title','Add IssuedBook')


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
            <li class="breadcrumb-item"><a href="{{route('issuedbook.index')}}">IssuedBooks</a></li>
            <li class="breadcrumb-item active" aria-current="page">IssuedBook</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">
      <h4>Add New IssuedBook</h4>

      <div class="mg-t-50">
        <form method="post" action="{{route('issuedbook.store')}}">
            @csrf

                <div class="form-group">
                    <label class="d-block"><b>Select User</b></label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                        <option disabled selected>--Select Student,Teacher or Staff--</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->firstname}},{{$user->lastname}} (--{{ucfirst($user->type)}}--)</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="" role="alert">
                            <strong><i>{{ $message }}</i></strong>
                        </span>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label class="d-block"><b>Example Title</b></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{old('name')}}">
                    @error('name')
                        <span class="" role="alert">
                            <strong><i>{{ $message }}</i></strong>
                        </span>
                    @enderror
                </div> --}}

                <!--Books-->
                <div class="form-group">
                    <label for="formGroupExampleInput2" class="d-block" style="font-weight:600"><b>Books</b></label>
                    <div data-label="Example" class="">
                        <select class="form-control select2 " multiple="multiple" name="books[]" multiple="">
                            <option label="Choose Course(s)"></option>
                            @foreach($books as $book)
                                <option value="{{$book->id}}">{{$book->title}}</option>
                            @endforeach
                        </select>
                    </div><!-- df-example -->
                    @error('books')
                        <span class="" role="alert">
                            <strong><i>{{ $message }}</i></strong>
                        </span>
                    @enderror
                </div>

                {{-- Return Date --}}
                <div class="form-group">
                    <label class="d-block"><b>Due Date</b></label>
                    <input type="date" class="form-control col-md-2 @error('due_date') is-invalid @enderror"  name="due_date" value="{{old('due_date')}}">
                    @error('due_date')
                        <span class="" role="alert">
                            <strong><i>{{ $message }}</i></strong>
                        </span>
                    @enderror
                </div>


              <button class="btn btn-primary btn-xs" id="btnpublish">Isue Book</button>
              <a href="{{route('issuedbook.index')}}" data-dismiss="modal" class="btn btn-dark btn-xs">Cancel</a>


        </form>
      </div>

    </div>

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
