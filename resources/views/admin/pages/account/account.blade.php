
@extends('admin.layout.admin')

@section('title','Account')


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
                  <li class="breadcrumb-item active" aria-current="page">Account</li>
               </ol>
            </nav>
         </div> 
      </div>

      <div class="">
         <div class="d-flex mg-b-20">
            <h4>Account</h4>
         </div>

         <div class="mg-t-20">
            
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