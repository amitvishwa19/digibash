
@extends('admin.layout.admin')

@section('title','Themes')


@section('style')

	

@endsection


@section('content')
	
<div class="content-body " id="contentbody">
    
  <div class="card" style="margin-bottom: 10px">

      <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Themes</li>
            </ol>
          </nav>
        </div> 
      </div>

      @include('admin.partials.alerts')
      
      <div class="row">      
        @foreach($themes as $theme)
          <div class="col-md-3">
            <div class="card mg-b-10">
              <div class="card-body">
                <h5 class="card-title">{{ucfirst($theme['folder'])}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text...</p>
                <a href="#" class="card-link">Activate</a>
              </div>
            </div>

          </div>
        @endforeach
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