
@extends('admin.layout.admin')

@section('title','Media')


@section('style')
    {{-- <link href="{{asset('public/admin/css/dropzone.css')}}" rel="stylesheet"> --}}
@endsection


@section('content')

<div class="content-body " id="contentbody">

  <div class="card">

    <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{route('app.admin.home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Media</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">
        <h4>Media</h4>
        <media-manager></media-manager>
    </div><!-- row -->

  </div>

</div>

@endsection


@section('modal')



@endsection


@section('javascript')
    {{-- <script src="{{asset('public/admin/js/dropzone.js')}}"></script> --}}

  	<script>

  	</script>

@endsection
