<ul>

@foreach ($items as $item)

    @php
        $originalItem = $item;

        $isActive = null;
        $styles = null;
        $icon = null;

        // Background Color or Color
        if (isset($options->color) && $options->color == true) {
            $styles = 'color:'.$item->color;
        }
        if (isset($options->background) && $options->background == true) {
            $styles = 'background-color:'.$item->color;
        }

        // Check if link is current
        if(url($item->link()) == url()->current()){
            $isActive = 'active';
        }
        
        // Set Icon
        if(isset($options->icon) && $options->icon == true){
            $icon = '<i class="' . $item->icon_class . '"></i>';
        }

    @endphp
    
    <li class="{{ $isActive }} {{ $item->class }}">
        <a href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}">
            {!! $icon !!}
            <i class="{{ $item->icon_class }}"></i>
            <span>{{ $item->title }}</span>
        </a>
        @if(!$originalItem->children->isEmpty())
            @include('admin.partials.menus.default', ['items' => $originalItem->children, 'options' => $options])
        @endif
    </li>
        
@endforeach

</ul>
