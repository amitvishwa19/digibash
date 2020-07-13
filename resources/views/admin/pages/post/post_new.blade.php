
@extends('admin.layout.admin')

@section('title','Add Post')


@section('style')

  <link href="{{asset('public/admin/lib/quill/quill.core.css')}}" rel="stylesheet">
  <link href="{{asset('public/admin/lib/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('public/admin/lib/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('public/admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/admin/lib/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">

@endsection


@section('content')
  
<div class="content-body " id="contentbody">
  <div class="card">    

    <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{route('app.admin.home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">New</li>
          </ol>
        </nav>
      </div> 
    </div>
  
    @include('admin.partials.alerts')

    <div class="rows row-lgs">

      <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
        @csrf
  
        <!--Title-->     
        <div class="form-group wpinput">
          <label for="formGroupExampleInput" class="d-block">Post Title</label>
          <input type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
            @if ($errors->has('title'))
              <small class="error-highlighter">{{ $errors->first('title') }}</small>
            @endif
        </div>

        <!--Description-->
        <div class="form-group wpinput">
          <label for="formGroupExampleInput2" class="d-block">Post Description</label>
          <input type="text" class="form-control input-sm" name="description">
        </div>
  
        <!--Body-->     
        <div class="form-group wpinput">
          <label for="formGroupExampleInput2" class="d-block">Post Body</label>
          <div id="post-body" class="ht-200 mg-b-25 form-group" style="background-color: #fff;margin-bottom: 20px;height: 400px;">
          </div>
          <input type="text" name="body" style="display: none" id="bodyinput" value="{{ old('body') }}">
        </div>

        <!--Post status-->
        <div class="form-group wpinput">
          <label for="formGroupExampleInput2" class="d-block">Post Status</label>
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status">
            <label class="custom-control-label" for="customSwitch1" id="pstatuslbl">Draft</label>
          </div>
        </div>

        <!--Post category-->
        <div class="form-group">
          <label for="formGroupExampleInput2" class="d-block" style="font-weight:600">Category</label>
          <div data-label="Example" class="">
              <select class="form-control select2" multiple="multiple" name="categories[]" multiple="">
                <option label="Choose one"></option>
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select> 
          </div><!-- df-example -->
        </div>

        <!--Post Tag-->
        <div class="form-group">
          <label for="formGroupExampleInput2" class="d-block" style="font-weight:600">Tags</label>
          <div data-label="Example" class="df-example demo-forms">
            <select type="text" class="form-control" value="" data-role="tagsinput" multiple="" name="tags[]"></select>
          </div><!-- df-example -->
        </div>

        <!--Feature Image-->
        <div class="form-group">
          <label for="formGroupExampleInput2" class="d-block">Feature Image</label>
          <div class="">
            <input type="file" class="" id="imageUpload" name="feature_image" value="Upload Image">
          </div>
          <div id="" class="mg-t-20 avatar-preview img-thumbnail" style="display: none;"></div>
          <div class="remove-image" style="display:none"><b>Remove image</b></div>
        </div>

        <!--Notification-->
        <div class="form-group">
          <label for="formGroupExampleInput2" class="d-block">Notifications</label>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="notify">
            <label class="custom-control-label" for="customCheck">Send notifications to subscribers</label>
          </div>
        </div>

        <!--Social posts-->
        <div class="form-group">
          <label for="formGroupExampleInput2" class="d-block">Social Publish</label>
          <div class="custom-control custom-checkbox d-flex">
            <input type="checkbox" class="custom-control-input" id="customCheck1" name="fb_publish">
            <label class="custom-control-label" for="customCheck1">Facebook</label>
          </div>
          <div class="custom-control custom-checkbox d-flex">
            <input type="checkbox" class="custom-control-input" id="customCheck2" name="twitter_publish">
            <label class="custom-control-label" for="customCheck2">Twitter</label>
          </div>
          <div class="custom-control custom-checkbox d-sm-flex">
            <input type="checkbox" class="custom-control-input" id="customCheck3" name="insta_publish">
            <label class="custom-control-label" for="customCheck3">Instagram</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck4" name="linked_publish">
            <label class="custom-control-label" for="customCheck4">LinkedIn</label>
          </div>
        </div>

        <button class="btn btn-primary btn-xs mg-t-20" type="submit" id="btnpublish">Save Draft</button>
        <a href="{{route('post.index')}}"  class="btn btn-dark btn-xs mg-t-20">Cancel</a>
        
      </form>

    </div><!-- row -->
  </div>  
</div>
      
@endsection


@section('modal')

  

@endsection


@section('javascript')

  <script src="{{asset('public/admin/lib/quill/quill.min.js')}}"></script>
  <script src="{{asset('public/admin/lib/select2/js/select2.min.js')}}"></script>
  <script src="{{asset('public/admin/lib/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>

  <script>
    $(function(){
        'use strict'

        var editor = new Quill('#post-body', {
          modules: {
            toolbar: [
              [{ 'header': [1, 2, 3, 4, 5, 6, false] }], 
              ['bold', 'italic','underline', 'strike'],
              [{ 'font': [] }],
              [{ 'align': [] }],
              ['link', 'blockquote', 'code-block', 'image'],
              [{ list: 'ordered' }, { list: 'bullet' }],
              [{ 'indent': '-1'}, { 'indent': '+1' }],
              [{ 'direction': 'rtl' }],
              ['clean'],
              [{ 'color': [] }, { 'background': [] }],
              
            ]
          },
          placeholder: '',
          theme: 'snow'
        });
        editor.on('text-change', function() {       
          $('#bodyinput').val(editor.root.innerHTML);
          //var text = editor.getText();
        });
        //editor.root.innerHTML = $('#bodyinput').val();

        // Change submit button text
        $('#customSwitch1').on('click',function(){
          if($('#customSwitch1').prop('checked')) {
              $('#pstatuslbl').html('Publish')
              $('#btnpublish').html('Publish')
          } else {
              $('#pstatuslbl').html('Draft')
              $('#btnpublish').html('Save Draft')
          }
        })

        //Asign qull editor content to body input
        $('#btnpublish').on('click',function(){
          //$('#bodyinput').val($('#post-body').html());
        })

        $('.select2').select2({
          placeholder: 'Choose one',
          searchInputPlaceholder: 'Search options'
        });


        $("#imageUpload").change(function() {
          console.log('Image Upload')
           if (this.files && this.files[0]) {
              var reader = new FileReader();

              reader.onload = function(e) {
                    $('.avatar-preview').css('background-image', 'url('+e.target.result +')');
                    $('.avatar-preview').css('height', '200px');
                    $('.avatar-preview').css('width', '300px');
                    $('.avatar-preview').css('display', 'block');
                    $('.avatar-preview').css('background-size', 'cover');
                    $('.avatar-preview').css('background-repeat', 'no-repeat');
                    $('.avatar-preview').css('background-position', 'center');
                    $('.avatar-preview').hide();
                    $('.avatar-preview').fadeIn(650);
                }
              reader.readAsDataURL(this.files[0]);
              $('.remove-image').css('display', 'block');
              $('.remove-image').css('cursor', 'pointer');    

           }
        });

        $('.remove-image').on('click',function(){
          $('.avatar-preview').css('background-image', 'none');
          $('.avatar-preview').css('display', 'none');
          $('.remove-image').css('display', 'none');
          $("#imageUpload").val('');
        });

    });
  </script>

@endsection