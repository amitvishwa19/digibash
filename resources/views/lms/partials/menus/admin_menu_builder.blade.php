<ol class="dd-list">

@foreach ($items as $item)

    <li class="dd-item" data-id="{{ $item->id }}">
        <div class="pull-right item_actions mg-t-10 mg-r-10">
            <a href="{{route('menu.item.edit',['menu'=>$item->menu_id,'item'=>$item->id])}}" class="btn btn-default btn-xs del-button dt-action-btn">Edit</a>
            <a href="javascript:;" id="{{ $item->id }}" data-menu-id="{{ $item->menu_id }}" class="btn btn-default btn-xs del-button dt-action-btn btn-menu-item">Delete</a>
        </div>
        <div class="dd-handle " style="border:1px solid grey">
            <span>{{ $item->title }}</span> <small class="url mg-l-20">{{ $item->link() }}</small>
        </div>
        @if(!$item->children->isEmpty())
            @include('admin.partials.menus.admin_menu_builder', ['items' => $item->children])
        @endif
    </li>

@endforeach

</ol>
