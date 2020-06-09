
@extends('admin.layout.admin')

@section('title','New Page')


@section('style')
  <link href="{{asset('public/admin/lib/quill/quill.core.css')}}" rel="stylesheet">
  <link href="{{asset('public/admin/lib/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('public/admin/lib/quill/quill.bubble.css')}}" rel="stylesheet">
@endsection


@section('content')
	
<div class="content-body " id="contentbody">
    
  <div class="card">

    <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Page</li>
          </ol>
        </nav>
      </div> 
    </div>

    <div class="">
      <h4>Add New Page</h4>

      <div class="mg-t-50">
        <form method="post" action="{{route('page.store')}}">
          @csrf
          
          <div class="wpinput form-group">
              <label class="d-block"><b>Page Title</b></label>
              <input type="text" class="form-control"  name="page_title" value="{{old('page_title')}}">
          </div>

          <!--Body-->     
          <div class="form-group wpinput">
            <label class="d-block"><b>Page Body</b></label>
            <div id="post-body" class="ht-200 mg-b-25 form-group" style="background-color: #fff;margin-bottom: 20px;height: 400px;">
            </div>
            <input type="text" name="body" style="display: none" id="bodyinput" value="{{ old('body') }}">
          </div>

          <div class="wpinput form-group">
              <label class="d-block"><b>Meta Description</b></label>
              <input type="text" class="form-control"  name="meta_description" value="{{old('meta_description')}}">
          </div>

          <div class="wpinput form-group">
              <label class="d-block"><b>Meta Keyword</b></label>
              <input type="text" class="form-control"  name="meta_keywords" value="{{old('meta_keywords')}}">
          </div>

          <!--Page status-->
          <div class="form-group wpinput">
            <label for="formGroupExampleInput2" class="d-block"><b>Page Status</b></label>
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="customSwitch1" name="page_status">
              <label class="custom-control-label" for="customSwitch1" id="pstatuslbl">Draft</label>
            </div>
          </div>




          <button class="btn btn-primary btn-xs" id="btnpublish">Save Draft</button>
          <a href="{{route('page.index')}}" class="btn btn-dark btn-xs">Cancel</a>

        </form>
      </div>
    </div><!-- row -->

  </div>

</div>
	    
@endsection


@section('modal')

	

@endsection


@section('javascript')
  <script src="{{asset('public/admin/lib/quill/quill.min.js')}}"></script>
	
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

          $('#customSwitch1').on('click',function(){
            if($('#customSwitch1').prop('checked')) {
                $('#pstatuslbl').html('Publish')
                $('#btnpublish').html('Publish')
            } else {
                $('#pstatuslbl').html('Draft')
                $('#btnpublish').html('Save Draft')
            }
          })

      });
  	</script>

@endsection