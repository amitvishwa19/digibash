
@extends('admin.layout.admin')

@section('title','Menu')


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
            <li class="breadcrumb-item active" aria-current="page">Menu</li>
          </ol>
        </nav>
      </div> 
    </div>

    <div class="row row-xs">
    
      <div class="d-flex">
        <span class="mg-r-5">Select the menu you want to edit </span>
        <form action="{{route('menu.index','menuselected=true')}}" method='post'>
          @csrf
          <select name="selectedmenu" id="" class="mg-r-5" required>
            <option value="" selected>--Select Menu--</option>
            @foreach($menus as $menu)
              <option value="{{$menu->slug}}">{{$menu->name}}</option>
            @endforeach
            <!-- <option value="header-menu" @if($item == 'header-menu') selected="selected" @endif>Header Menu</option>
            <option value="footer-menu">Footer Menu</option>
            <option value="sidebar-menu">Sidebar Menu</option>
            <option value="test-menu">Test Menu</option> -->
          </select>
          <button class="btn btn-primary btn-xs mg-r-10" style="margin-top:-5px">Choose</button>
        </form>
      </div>
      
      or <a href="{{route('menu.index','addmenu=true')}}" class="mg-l-10">Create new menu</a>

    </div><!-- row -->
    {{request()->menuselected}}
    @if(request()->menuselected )
      {{$item}} -  Selected menu will display here
    @endif

    @if(request()->addmenu)
      Add menu form here
    @endif
  

  </div>

</div>
	    
@endsection


@section('modal')

	

@endsection


@section('javascript')

	
  	<script>
  		
  	</script>

@endsection
