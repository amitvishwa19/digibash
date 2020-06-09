
    @foreach($items as $item)
        <li class="nav-item {{ (!$item->children->isEmpty()) ? 'with-sub' : null  }}">
          <a href="{{url($item->link())}}" class="nav-link">
            <i class="{{$item->icon_class}}" aria-hidden="true"></i><span>{{$item->title}}</span>
          </a>
          @if(!$item->children->isEmpty())
            @foreach($item->children as $child)
              <ul>
                <li><a href="{{url($child->link())}}" >{{$child->title}}</a></li>
              </ul>
            @endforeach
          @endif
        </li>
    @endforeach



