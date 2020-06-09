
@extends('admin.layout.admin')

@section('title','Media')


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
            <li class="breadcrumb-item active" aria-current="page">Media</li>
          </ol>
        </nav>
      </div> 
    </div>

    <div class="">
      <h4>Media</h4>

      <media-manager 
        base-path="{{ config('digizigs.media.path', '/') }}"
        :show-folders="{{ config('digizigs.media.show_folders', true) ? 'true' : 'false' }}"
        :allow-upload="{{ config('digizigs.media.allow_upload', true) ? 'true' : 'false' }}"
        :allow-move="{{ config('digizigs.media.allow_move', true) ? 'true' : 'false' }}"
        :allow-delete="{{ config('digizigs.media.allow_delete', true) ? 'true' : 'false' }}"
        :allow-create-folder="{{ config('digizigs.media.allow_create_folder', true) ? 'true' : 'false' }}"
        :allow-rename="{{ config('digizigs.media.allow_rename', true) ? 'true' : 'false' }}"
        :allow-crop="{{ config('digizigs.media.allow_crop', true) ? 'true' : 'false' }}"
        :details="{{ json_encode(['thumbnails' => config('digizigs.media.thumbnails', []), 'watermark' => config('digizigs.media.watermark', (object)[])]) }}"
        
        ></media-manager>



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