<option value="{{$category->id}}">
    
    @if($loop->depth == 2)
    >>
    @elseif($loop->depth==3)
    >>>
    @elseif($loop->depth==4)
    >>>>
    @endif
    {{$category->name}}

</option>

@if(count($category->child) > 0)
    <ul>
    @foreach($category->child as  $category)
        @include('admin.pages.category.child_category_select', $category)
    @endforeach
    </ul>
@endif