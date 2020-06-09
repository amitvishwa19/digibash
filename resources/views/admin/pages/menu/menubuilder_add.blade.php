
@extends('admin.layout.admin')

@section('title','Add Menu Item')


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
                  <li class="breadcrumb-item"><a href="{{route('menu.index')}}">Menu</a></li>
                  <li class="breadcrumb-item"><a href="{{route('menu.builder',$id)}}">Builder</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Item</li>
               </ol>
               </nav>
         </div> 
      </div>

      @include('admin.partials.alerts') 

      <div class="">
         <h4>Create New Menu Item</h4>
         
         <div>
            <form method="post" action="{{route('menu.item.add',['menu'=>$id])}}">
               @csrf
               <input type="hidden" name=menu_id value="{{$id}}">

               <div class="form-group wpinput">
                  <label for="exampleInputEmail1">Menu Name</label>
                  <input type="text" class="form-control" name="title"  />
               </div>

               <div class="form-group wpinput">
                  <label for="exampleInputEmail1" col-md-10>Link Type</label>
                  <select class="form-control" name="link_type">
                     <option value='url'>Static URL</option>
                     <option value='route'>Dynamic Route</option>
                  </select>
               </div>

               <div class="form-group wpinput">
                  <label >URL for the Menu Item</label>
                  <input type="text" class="form-control" name="url"  />
               </div>

               <div class="form-group wpinput">
                  <label for="exampleInputEmail1">Additional Class</label>
                  <input type="text" class="form-control" name="class"  />
               </div>

               <div class="form-group wpinput">
                  <label for="exampleInputEmail1">Icon Class</label>
                  <input type="text" class="form-control" name="icon_class"/>
               </div>

               <div class="form-group wpinput">
                  <label for="exampleInputEmail1">Open In</label>
                  <select class="form-control" name='target'>
                     <option value='_self'>Same Tab/Window</option>
                     <option value='_blank'>New Tab/Window</option>
                  </select>
               </div>

               <button class="btn btn-primary btn-xs">Add Menu Item</button>
               <a href="{{route('menu.builder',['menu'=>$id])}}" class="btn btn-dark btn-xs">Cancel</a>
            </form>
         </div>

         

      </div><!-- row -->
 
    
    

   </div>

</div>
	    
@endsection


@section('modal')

	

@endsection


@section('javascript')
  

@endsection
