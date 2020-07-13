
@extends('admin.layout.admin')

@section('title','Post')


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
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post</li>
          </ol>
        </nav>
      </div> 
   </div>
    
   @include('admin.partials.alerts')

    

   <div class="">

      <div class="d-flex mg-b-5">
            <h4>{{$post->title}}</h4>
            <a href="{{route('post.edit',$post->id)}}" class="btn btn-info btn-xs mg-l-10">Edit Post</a>
            <a href="{{route('post.index')}}" class="btn btn-dark btn-xs mg-l-10">Cancel</a>
      </div>
      <small><b>Created by:</b> <a href="">{{$post->author->firstname}},{{$post->author->lastname}}</a> <b>at:</b> {{$post->created_at->diffForHumans()}}</small>
        
      <div class="mg-t-20">  
         <div>
            <h5>Title</h5>
            <p>{{$post->title}}</p>
         </div>
         <hr>
         <div>
            <h5>Post Body</h5>
            <p>{!! $post->body !!}</p>
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