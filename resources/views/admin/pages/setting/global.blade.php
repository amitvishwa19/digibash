<form method="POST" action="{{route('setting.store',['type'=>'global'])}}" enctype="multipart/form-data" class="mg-t-10"> 
   @csrf
   <div class="row">

      <div class="col-6 col-xs-12">

         <!-- app_name Field -->
         <div class="form-group row wpinput">
            <label for="app_name" class="col-4 control-label text-right">Application Name</label>
            <div class="col-8">
               <input class="form-control  input-lg" name="app_name" type="text" value="{{setting('app.name')}}{{old('app_name')}}">
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

         <!-- Theme Contrast Field -->
         <div class="form-group row wpinput">
            <label for="theme_contrast" class="col-4 control-label text-right">Theme contract</label>
            <div class="col-8">
               <select class="" id="theme_contrast" name="app_theme" >
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
               <select class="" id="theme_contrast" name="app_page" >
                  <option value="home" {{ setting('app.page') == 'home' ? 'selected' : ''}}>Home</option>
                  <option value="blog" {{ setting('app.page') == 'blog' ? 'selected' : ''}}>Blog</option>
               </select>
               <div class="form-text text-muted">Select your prefer theme contract</div>
            </div>
         </div>

      </div>

      <div class="col-6 col-xs-12">

         <!-- App icon -->
         <div class="form-group row wpinput">
            <label for="" class="col-4 control-label">Application Logo</label>
            <div class="d-flex col-8">

               <input type="file" class="" id="imageUpload" name="app_logo" value="Upload Image">

               <div id="" class="mg-t-20 icon-preview avatar-preview img-thumbnail pull-left" @if(setting('app.logo')) style="
                  display:block;
                  background-image:url({{setting('app.logo')}});" @else style="display:none" @endif>
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
      <!-- Submit Field -->
      
      <div class="form-group mt-4 col-12 ">
            <button type="submit" class="btn btn-primary btn-xs mg-l-40"><i class="fa fa-save"></i> Save Global Settings
            </button>
      </div>

   </div>
</form>