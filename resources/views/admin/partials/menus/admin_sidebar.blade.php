<ul>
    @foreach($items as $item)
        <li><a href="{{$item->link()}}">{{$item->title}}</a></li>
        @foreach($item->children as $child)
dasdasd
        @endforeach
    @endforeach
</ul>



<!-- <ul class="nav nav-aside">

<li class="nav-item">
  <a href="{{route('app.admin.home')}}" class="nav-link">
    <i class="fa fa-tachometer" aria-hidden="true"></i> <span>Dashboard</span>
  </a>
</li>

<li class="nav-item with-sub">
  <a href="" class="nav-link"><i class="fa fa-puzzle-piece"></i> <span>Publish</span></a>
  <ul>
    <li><a href="{{route('post.index')}}">Posts</a></li>
    <li><a href="{{route('page.index')}}">Pages</a></li>
    <li><a href="{{route('category.index')}}">Categories</a></li>
    <li><a href="{{route('menu.index')}}">Menus</a></li>
  </ul>
</li>
</ul>  -->