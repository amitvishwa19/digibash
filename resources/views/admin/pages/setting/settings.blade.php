
@extends('admin.layout.admin')

@section('title','Settings')


@section('style')

	

@endsection


@section('content')
	
<div class="content-body " id="contentbody">
    
  <div class="card">
      <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
        <div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Settings</li>
            </ol>
          </nav>
        </div> 
      </div>

      @include('admin.partials.alerts')
      
      <div class="row row-xs">
        
        <div data-label="Example" class="df-example" style="width:100%">

          <ul class="nav nav-line " id="myTab5" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab5" data-toggle="tab" href="#home5" role="tab" aria-controls="home" aria-selected="true">Application</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab5" data-toggle="tab" href="#contact5" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
          </ul>

          <div class="tab-content mg-t-20" id="myTabContent5">

            <div class="tab-pane fade show active container col-md-12 col-lg-12" id="home5" role="tabpanel" aria-labelledby="home-tab5" >
            
            <form method="post" action="{{route('setting.update', '1')}}" enctype="multipart/form-data">
              @csrf
              {{method_field('PUT')}}
              
              <!-- App NAme -->
              <div class="form-group row wpinput">
                <label for="inputEmail3" class="col-sm-2 col-form-label">App Name</label>
                <input type="text" class="col-md-6" name="app_name" placeholder="App Name" value="{{$settings['app_name']}}">
              </div>
              
              <!-- App Description -->
              <div class="form-group row wpinput">
                <label for="inputPassword3" class="col-sm-2 col-form-label">App Description</label>
                <input type="text" class="col-md-6" placeholder="App Description" name="app_desc" value="{{$settings['app_description']}}">
              </div>
              
              <!-- App icon -->
              <div class="form-group row wpinput">
                <label for="" class="col-sm-2 col-form-label">App Icon</label>
                <div>
                  <input type="file" class="" id="imageUpload" name="app_icon" value="Upload Image">
                </div>  
                <div id="" class="mg-t-20 icon-preview img-thumbnail pull-left" ></div>
                <div class="remove-image" style="display:none"><b>Remove image</b></div>
              </div>

              <!-- App Fevicon -->
              <div class="form-group row wpinput">
                <label for="" class="col-sm-2 col-form-label">App Fevicon</label>
                <div class="">
                  <input type="file" class="" id="appicon" name="app_fevicon" value="Upload Image">
                </div>
                <div id="" class="mg-t-20 icon-preview img-thumbnail"></div>
                <div class="remove-image" style="display:none"><b>Remove image</b></div>
              </div>

              <!-- App Theme -->
              <div class="form-group row wpinput">
                <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Theme</label>
                <select name="app_theme">
                  @foreach($themes as $theme)
                    <option value="{{$theme['folder']}}" {{ $theme['folder'] == $settings['app_theme'] ? 'selected' : ''}} >{{ucfirst($theme['folder'])}}</option>
                  @endforeach
                </select>
              </div>

              <!-- Post Per Page -->
              <div class="form-group row wpinput">
                <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Posts per page</label>
                <input type="number" class="mg-l-20"  name="post_per_page" value="{{$settings['post_per_page']}}">
              </div>
              
              <!-- App Home Page -->
              <div class="form-group row wpinput">
                <label for="formGroupExampleInput2" class="col-sm-2 col-form-label">Home Page</label>
                <select name="app_page" id="" style="" value="blog">
                  <option value="home" {{$settings['app_page'] == "home" ? 'selected' : ''}} >Home</option>
                  <option value="blog" {{$settings['app_page'] == "blog" ? 'selected' : ''}}>Blog</option>
                </select>
              </div>
              

              <button class="btn btn-primary btn-xs mg-t-20" type="submit" id="btnpublish">Save</button>

            </form>

            </div>

            <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab5">
              <h6>Profile</h6>
              <p class="mg-b-0">Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat.</p>
            </div>

            <div class="tab-pane fade" id="contact5" role="tabpanel" aria-labelledby="contact-tab5">
              <h6>Contact</h6>
              <p class="mg-b-0">Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.</p>
            </div>

          </div>

        </div><!-- df-example -->
        
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