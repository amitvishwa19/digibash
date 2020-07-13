<ol class="dd-list">
    @foreach ($categories as $category)
        <li class="dd-item" data-id="{{ $category->id }}">
            <div class="pull-right item_actions mg-t-10 mg-r-10">
                @if($category->status == true)
                    <span class="badge badge-info">Active</span>
                @else
                    <span class="badge badge-warning">InActive</span>
                @endif
                <a href="{{ route('category.edit' , $category->id)}}" class="btn btn-default btn-xs del-button dt-action-btn mp-0">Edit</a>
                <a href="javascript:void(0);" class="btn btn-default btn-xs del-button dt-action-btn btn-menu-item delete" id="{{$category->id}}">Delete</a>
            </div>
            <div class="dd-handle " style="border:1px solid grey;padding:10px 20px;">
                <span>{{ $category->name }}</span>
            </div>

            @if(!$category->child->isEmpty())
                @include('admin.pages.category.child_cat',['categories' => $category->child])
            @endif
        </li>
    @endforeach
</ol>
