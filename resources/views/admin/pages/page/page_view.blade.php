
@extends('admin.layout.admin')

@section('title','View Page')


@section('style')
@endsection


@section('content')
	
<div class="content-body " id="contentbody">
    
   <div class="card">

      <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
         <div>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><a href="route('app.admin.home')">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="route('page.index')">Pages</a></li>
                  <li class="breadcrumb-item active" aria-current="page">View</li>
               </ol>
            </nav>
         </div> 
      </div>

      <div class="">
         <div class="d-flex mg-b-5">
            <h4>View Page ({{$page->title}})</h4>
            <a href="{{route('page.edit',$page->id)}}" class="btn btn-info btn-xs mg-l-10">Edit Page</a>
            <a href="{{route('page.index')}}" class="btn btn-dark btn-xs mg-l-10">Cancel</a>
         </div>
         <small><b>Created by:</b> {{$page->author->name}} <b>at:</b> {{$page->created_at->diffForHumans()}}</small>

         <div class="mg-t-10">
            Body
         </div>

         <div class="mg-t-20">
            <div>
               <h5><b>Title</b></h5>
               <p>{{$page->title}}</p>
            </div>
            <hr>
            <div>
               <h5><b>Body</b></h5>
               <p>{!! $page->body !!}</p>
            </div>

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

         
      });
  	</script>

@endsection