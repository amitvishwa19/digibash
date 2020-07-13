
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
              <li class="breadcrumb-item"><a href="{route('app.admin.home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Themes</li>
            </ol>
          </nav>
        </div> 
      </div>

      
      
      <div class="">      

        <div class="d-flex mg-b-20">
          <h4>Themes</h4>
          <span class="mg-t-4 mg-l-10"><a href="" class="wp">Add Theme</a> or <a href="" class="wp">Import Theme</a></span> 
        </div>


        <div class="row">
          @foreach($themes as $theme)
            <div class="col-md-3">

              <div class="pos-relative overflow-hidden rounded card mg-b-10">
                @if(setting('app.theme') == $theme['theme_dir'])
                  <div class="marker-icon marker-success pos-absolute t-0 l-0"><i data-feather="zap"></i></div>
                @endif
                <img src="{{$theme['theme_image']}}" class="img-fluid" alt="" style="height:250px;width:250px;margin:auto">
                <div class="mg-t-10"><h5><b>{{ucfirst($theme['theme_dir'])}}</b></h5></div>
                <div class="mg-t-5">
                  
                    <a href="#" class="btn btn-primary btn-xs theme-activate" id="{{$theme['theme_dir']}}">Activate</a>
                  
                  <a href="#" class="btn btn-dark btn-xs theme-delete" id="{{$theme['theme_dir']}}">Delete</a>
                </div>
              </div>

            </div>

            

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
  		$(function(){
         'use strict'

        $(document).on('click','.theme-activate',function(){
          var id =  $(this).attr('id');
          $.ajax({
              url: "theme",
              type:"post",
              data: { _token: "{{ csrf_token() }}",theme: id},
              success: function(response){
                location.reload();
                toast({
                    type: "success",
                    title: "Theme Activated Successfully" + response
                });
              }
          });
        });

        $(document).on('click','.theme-delete',function(){
          var id =  $(this).attr('id');
          swalWithBootstrapButtons({
              title: "Delete Selected Theme?" + id,
              text: "You won't be able to revert this!",
              type: "warning",
              showCancelButton: true,
              confirmButtonText: "Delete",
              cancelButtonText: "Cancel",
              reverseButtons: true
          }).then(result => {
              if (result.value) {
                $.ajax({
                    url: "theme/"+id,
                    type:"post",
                    data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                    success: function(result){
                      location.reload();
                      toast({
                          type: "success",
                          title: "Theme Deleted Successfully"
                      });
                    }
                });
              }
          });
        });

      });
  	</script>

@endsection