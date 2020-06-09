
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
                  <li class="breadcrumb-item"><a href="{{route('menu.builder',$menuitem->menu_id)}}">Builder</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Item</li>
               </ol>
               </nav>
         </div> 
      </div>

      @include('admin.partials.alerts') 

      <div class="">
         <h4>Edit Menu Item ({{$menuitem->title}})</h4>
         
         <div>
            <form method="post" action="{{route('menu.item.update',['menu'=>$menuitem->menu_id,'item'=>$menuitem->id])}}">
                @csrf
                {{method_field('PUT')}}

               <input type="hidden" name=menu_id value="{{$menuitem->menu_id}}">
               <input type="hidden" name=menu_item_id value="{{$menuitem->id}}">

               <div class="form-group wpinput">
                  <label for="exampleInputEmail1">Menu Name</label>
                  <input type="text" class="form-control" name="title" value="{{$menuitem->title}}{{old('title')}}" />
               </div>

               <div class="form-group wpinput">
                  <label for="exampleInputEmail1" col-md-10>Link Type</label>
                  <select class="form-control" name="link_type">
                     <option value='url' {{ $menuitem->url !== null ? 'selected' : null }}>Static URL</option>
                     <option value='route' {{ $menuitem->url == null ? 'selected' : null }}>Dynamic Route</option>
                  </select>
               </div>

               <div class="form-group wpinput">
                  <label >URL for the Menu Item</label>
                  <input type="text" class="form-control" name="url" value="{{ $menuitem->url == null ? $menuitem->route : $menuitem->url }}{{old('url')}}" />
               </div>

               <div class="form-group wpinput">
                  <label for="exampleInputEmail1">Additional Class</label>
                  <input type="text" class="form-control" name="class" value="{{$menuitem->class}}{{old('class')}}"/>
               </div>

               <div class="form-group wpinput">
                  <label for="exampleInputEmail1">Icon Class</label>
                  <input type="text" class="form-control" name="icon_class" value="{{$menuitem->icon_class}}{{old('icon_class')}}"/>
               </div>

               <div class="form-group wpinput">
                  <label for="exampleInputEmail1">Open In</label>
                  <select class="form-control" name='target'>
                     <option value='_self' {{ $menuitem->target == '_self' ? 'selected' : null }}>Same Tab/Window</option>
                     <option value='_blank' {{ $menuitem->target == '_blank' ? 'selected' : null }}>New Tab/Window</option>
                  </select>
               </div>

               <button class="btn btn-primary btn-xs">Update Menu Item</button>
               <a href="{{route('menu.builder',['menu'=>$menuitem->menu_id])}}" class="btn btn-dark btn-xs">Cancel</a>
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
