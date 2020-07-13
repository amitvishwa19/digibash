<li class="badge badge-pill {{ $category->parent_id ? 'badge-success' : 'badge-primary' }} mg-b-5">
    
    
    {{ $category->parent_id ? ' -- ' . $category->name : $category->name }}
    @if($category->slug != 'uncategorized')
        <a href="{{ route('category.edit' , $category->id)}}" class="fa fa-pencil mg-l-5" data-toggle="tooltip" data-placement="top" title="edit"></a>
        <a href="" onClick="
                        var res = confirm('Are you sure you want to delete this category {{$category->name}} ? ')
                            if(res){
                                event.preventDefault();
                                document.getElementById('cat-delete-{{$category->id}}').submit();
                            }" 
                        class="fa fa-trash mg-l-5">
        </a>
        <form id="cat-delete-{{$category->id}}" action="{{route('category.destroy',$category->id)}}" method="post">
            <input type="hidden" name="_method" value="delete" style="display:none;">  
            @csrf
            {{ method_field('DELETE') }} 
        </form>
    @endif
   
</li>


<br>
@if (count($category->child) > 0)
    <ul>
    @foreach($category->child as $key=> $category)
    
        @include('admin.pages.category.child_category', [$category,$key])
    @endforeach
    </ul>
@endif