<div class="mg-b-10">
   <h6><b>Global Settings</b></h6>
</div>

<div>
   <form method="POST" action="{{route('setting.store',['type'=>'global'])}}" enctype="multipart/form-data" class="mg-t-10">
      @csrf
      <div class="row">

         <div class="col-6 col-xs-12">

            <!-- app_name Field -->
            <div class="form-group row">
               <label for="app_name" class="col-4 control-label text-right">Application Name</label>
               <div class="col-8">
                  <input class="form-control  input-xs" name="app_name" type="text" value="{{setting('app.name')}}{{old('app_name')}}">
                  <div class="form-text text-muted">
                        The application name appear in title
                  </div>
               </div>
            </div>

            <!-- app_short_description Field -->
            <div class="form-group row wpinput">
               <label for="app_short_description" class="col-4 control-label text-right">Short description</label>
               <div class="col-8">
                  <input class="form-control" placeholder="Enter a short description" name="app_description" type="text" value="{{setting('app.description')}}{{old('app_description')}}">
                  <div class="form-text text-muted">
                        The short description appear in title
                  </div>
               </div>
            </div>

            <!-- App Theme -->
            <div class="form-group row wpinput">
               <label for="theme_contrast" class="col-4 control-label text-right">Theme contract</label>
               <div class="col-8">
                  <select class="form-control" id="theme_contrast" name="app_theme" >
                     @foreach($themes as $theme)
                        <option value="{{$theme['folder']}}" {{ $theme['folder'] == setting('app.theme') ? 'selected' : ''}}>{{ucfirst($theme['folder'])}}</option>
                     @endforeach
                  </select>
                  <div class="form-text text-muted">Select your prefer theme contract</div>
               </div>
            </div>

            <!-- Home Page -->
            <div class="form-group row wpinput">
               <label for="theme_contrast" class="col-4 control-label text-right">Home Page</label>
               <div class="col-8">
                  <select class="form-control" id="theme_contrast" name="app_page" >
                     <option value="home" {{ setting('app.page') == 'home' ? 'selected' : ''}}>Home</option>
                     <option value="blog" {{ setting('app.page') == 'blog' ? 'selected' : ''}}>Blog</option>
                  </select>
                  <div class="form-text text-muted">Select your prefer theme contract</div>
               </div>
            </div>

            <!-- Admin Route -->
            <div class="form-group row wpinput">
               <label for="app_name" class="col-4 control-label text-right">Admin Route</label>
               <div class="col-8">
                  <input class="form-control" name="app_admin" type="text" value="{{setting('app.admin')}}{{old('app_admin')}}">
                  <div class="form-text text-muted">
                        This the admin route Admin Pannel
                  </div>
               </div>
            </div>

            <!-- Allow user to register -->
            <div class="form-group row wpinput">
               <label for="app_name" class="col-4 control-label text-right">Allow User Registration</label>
               <div class="col-8">
                  <div class="custom-control custom-checkbox">
                     <input type="checkbox" name="user_registration" class="custom-control-input" id="customCheck1" {{ setting('app.registration') == 'yes' ? 'checked' : ''}}>
                     <label class="custom-control-label" for="customCheck1">This will allow user to register to manage Admin</label>
                  </div>
               </div>
            </div>

         </div>

         <div class="col-6 col-xs-12">

            <!-- App icon -->
            <div class="form-group row wpinput">
               <label for="" class="col-4 control-label">Application Logo</label>
               <div class="d-flex col-8">

                  <input type="file" class="" id="imageUpload" name="app_logo" value="Upload Image">

                  <div id="" class="mg-t-20 icon-preview avatar-preview img-thumbnail pull-left" @if(setting('app.icon')) style="
                     display:block;
                     background-image:url({{setting('app.icon')}});" @else style="display:none" @endif>
                  </div>
               </div>
               <div class="remove-image" style="display:none"><b>Remove image</b></div>
            </div>

            <!-- App fevicon -->
            <div class="form-group row wpinput">
               <label for="" class="col-4 control-label">Application Fevicon</label>
               <div class="d-flex col-8">

                  <input type="file" class="" id="imageUpload" name="app_fevicon" value="Upload Image">

                  <div id="" class="mg-t-20 icon-preview avatar-preview img-thumbnail pull-left" @if(setting('app.fevicon')) style="
                     display:block;
                     background-image:url({{setting('app.fevicon')}});" @else style="display:none" @endif>
                  </div>
               </div>
               <div class="remove-image" style="display:none"><b>Remove image</b></div>
            </div>


         </div>


      </div>
      <button class="btn btn-primary btn-xs mg-l-50">Save</button>

   </form>
</div>
