@extends('admin.layout.admin')

@section('title','Categories')


@section('style')
    <!-- <link href="{{asset('public/admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
   <link href="{{asset('public/admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet"> -->
@endsection


@section('content')

<div class="content-body " id="contentbody">

  <div class="card">
    <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Categories</li>
          </ol>
        </nav>
      </div>
    </div>

    <h4>Add Category</h4>

        <!-- Menu info -->
        <div class="alert alert-primary" role="alert" style="margin:0">
            <b class="mg-b-10">How To Use:</b>
            <li>
               You can output a category anywhere on your site by calling
               <b>category()</b>
            </li>
            <li>
                You can output a category under parent category anywhere on your site by calling
                <b>category('parent-category')</b>
            </li>
         </div>
         <!-- Menu info -->

        <div class="row">
            <div class="col-sm-5">

                <form method="post" action="{{route('category.store')}}"  class="mg-t-30">
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Parent Category</label>
                        <select class="form-control" name="parent">
                            <option value="">Select parent category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->name}}
                                    @foreach($category->child as $c1)
                                            <option value="{{$c1->id}}">
                                            {{$category->name}} > {{$c1->name}}
                                            @foreach($c1->child as $c2)
                                                <option value="{{$c2->id}}">
                                                        {{$category->name}} > {{$c1->name}} > {{$c2->name}}
                                                        @foreach($c2->child as $c3)
                                                        <option value="{{$c3->id}}">
                                                            {{$category->name}} > {{$c1->name}} > {{$c2->name}} > {{$c3->name}}
                                                            @foreach($c3->child as $c4)
                                                                <option value="{{$c4->id}}">
                                                                    {{$category->name}} > {{$c1->name}} > {{$c2->name}} > {{$c3->name}} > {{$c4->name}}
                                                                </option>
                                                            @endforeach
                                                        </option>
                                                        @endforeach
                                                </option>
                                            @endforeach
                                            </option>
                                    @endforeach
                                </option>
                                @endforeach
                        </select>
                        <small id="emailHelp" class="form-text text-muted"><i>By Selecting this WebBlock Name will become category under select parent</i></small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" class="form-control" name="category" value="{{ old('category') }}" required>
                        <small id="emailHelp" class="form-text text-muted"><i>The name is how it appears on your site</i>.</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Class</label>
                        <input type="text" class="form-control" name="class" value="{{ old('class') }}">
                        <small id="emailHelp" class="form-text text-muted"><i>Additional class</i>.</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Icon Class</label>
                        <input type="text" class="form-control" name="icon_class" value="{{ old('icon_class') }}">
                        <small id="emailHelp" class="form-text text-muted"><i>Font Icon class</i>.</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Status</label>
                        <select name="status"  class="form-control">
                            <option value = 1>Active</option>
                            <option value = 0 selected>InActive</option>
                        </select>
                    </div>

                    <button class="btn btn-primary btn-sm">Add</button>

                </form>
            </div>

            <div class="col-sm-7">

                <div class="mg-t-50 mg-b-50">
                    <div class="dd">
                        @include('admin.pages.category.child_cat',$categories)
                    </div>
                </div>

                <div class="mg-t-50">
                    <b>Note:</b><br>
                    <small><i>Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the category Uncategorized.</i></small>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


@section('modal')



@endsection


@section('javascript')
    <!-- <script src="{{asset('public/admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{asset('public/admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script> -->

<script>
    $(function(){
         'use strict'

        $('.dd').nestable({
            onDragStart: function(l,e){
                // l is the main container
                // e is the element that was moved
                //console.log(l)
                //console.log(e)
            }
        });

        $('.dd').on('change', function (e) {
            $.post('{{ route('categories.order.item') }}', {
                order: JSON.stringify($('.dd').nestable('serialize')),
                _token: '{{ csrf_token() }}'
            }, function (data) {
                toast({
                    type: "success",
                    title: "Categories reordered successfully"
                });
            });
        });


        //Action Delete function
        $(document).on('click','.delete',function(){
            var id =  $(this).attr('id');
            swalWithBootstrapButtons({
                title: "Delete Selected Category?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                reverseButtons: true
            }).then(result => {
                if (result.value) {
                $.ajax({
                    url: "category/"+id,
                    type:"post",
                    data: {_method: 'delete', _token: "{{ csrf_token() }}"},
                    success: function(result){
                        location.reload();
                        toast({
                            type: "success",
                            title: "Category Deleted Successfully"
                        });
                    }
                });
                }
            });
        });



    });

</script>

@endsection
