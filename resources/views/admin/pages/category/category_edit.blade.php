@extends('admin.layout.admin')

@section('title','Categories')


@section('style')

@endsection


@section('content')

<div class="content-body " id="contentbody">

    <div class="card">

        <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
            <div>
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item "><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="{{route('category.index')}}">Categories</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
                </nav>
            </div>
        </div>

        @include('admin.partials.alerts')

        <div class="row row-xs">

            <div class="col-sm-5">
                <h4>Add Category</h4>
                <form method="post" action="{{route('category.update', $category->id)}}"  class="mg-t-30">
                    @csrf
                    {{method_field('PUT')}}
                    
                    

                    <div class="form-group wpinput">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" class="form-control" name="category" value="{{$category->name}}{{ old('name') }}" required>
                        <small id="emailHelp" class="form-text text-muted"><i>The name is how it appears on your site</i>.</small>
                    </div>

                    
                    <div class="form-group wpinput">
                        <label for="exampleFormControlSelect1">Parent Category</label>
                        <select class="form-control" name="parent">
                            <option value="" selected>----Select parent category----</option>
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}"
                                    @if($category->parent)
                                        @if($cat->id == $category->parent->id)
                                            selected="selected"
                                        @endif
                                    @endif
                                    >{{$cat->name}}

                                    @foreach($cat->child as $c1)
                                        <option value="{{$c1->id}}"
                                            @if($category->parent)
                                                @if($c1->id == $category->parent->id)
                                                    selected="selected"
                                                @endif
                                            @endif
                                            >{{$cat->name}} > {{$c1->name}}
                                            
                                            @foreach($c1->child as $c2)
                                                <option value="{{$c2->id}}"
                                                    @if($category->parent)
                                                        @if($c2->id == $category->parent->id)
                                                            selected="selected"
                                                        @endif
                                                    @endif
                                                >{{$cat->name}} > {{$c1->name}} > {{$c2->name}}
                                                </option>
                                            @endforeach
                                        </option>
                                    @endforeach
                                </option>                               
                            @endforeach
                        </select>
                        <small id="emailHelp" class="form-text text-muted"><i>By Selecting this WebBlock Name will become category under select parent</i></small>
                    </div>

                   

                    <!-- <div class="form-group wpinput">
                        <label for="exampleFormControlSelect1">Parent Category</label>
                        <select class="form-control" name="parents">
                            <option value="">Select parent category</option>
                                @foreach($categories as $category)
                                    @include('admin.pages.category.child_category_select', $category)                       
                                @endforeach
                        </select>
                        <small id="emailHelp" class="form-text text-muted">Leave blank to creatge parent category</small>
                    </div> -->

                    <button class="btn btn-primary btn-sm">Update</button>

                </form>
            </div>

            <div class="col-sm-5 offset-sm-1">
                
                <ul class="cat-list-display ">
                    @if (count($categories) <= 0)
                        <h4>No category found</h4>
                    @else
                        <h4>Categories</h4>
                        @foreach ($categories as $key => $category)
                        
                            @include('admin.pages.category.child_category',[ $category,$key])
                        @endforeach
                    @endif
                    
                </ul>
                <b>Note:</b>
                <p><small><i>Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the category Uncategorized.</i></small></p>
            </div>
        </div>

    </div>
</div>

@endsection


@section('modal')



@endsection


@section('javascript')


<script>

</script>

@endsection