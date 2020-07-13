
@extends('admin.layout.admin')

@section('title','Add Product')


@section('style')

<link href="{{asset('public/admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('public/admin/lib/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">

@endsection


@section('content')

<div class="content-body " id="contentbody">

  <div class="card">

    <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{route('app.admin.home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.index')}}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">
      <h4>Add New Product</h4>

      <div class="mg-t-50">
            <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    
                    <div class="col-4">

                        {{-- Shop --}}
                        <div class="form-group">
                            <label class="d-block"><b>Select Shop*</b></label>
                            <select name="shop_id" class="form-control @error('shop_id') is-invalid @enderror">
                                <option disabled selected> --Select Shop-- </option>
                                @foreach (auth()->user()->shops()->get() as $shop)
                                    <option value="{{$shop->id}}">{{$shop->name}}</option>
                                @endforeach
                            </select>
                            @error('shop_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Product name --}}
                        <div class="form-group">
                            <label class="d-block"><b>Product Name*</b></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Product category --}}
                        <div class="form-group">
                            <label for="formGroupExampleInput2" class="d-block" style="font-weight:600"><b>Product Category</b></label>
                            <div data-label="Example" class="">
                                <select class="form-control select2" multiple="multiple" name="categories[]" multiple="">
                                <option label="Choose one"></option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                            </div><!-- df-example -->
                        </div>

                        {{-- Product Tag --}}
                        <div class="form-group">
                            <label for="formGroupExampleInput2" class="d-block" style="font-weight:600"><b>Product Tags</b></label>
                            <div data-label="Example" class="df-example demo-forms">
                            <select type="text" class="form-control" value="" data-role="tagsinput" multiple="" name="tags[]"></select>
                            </div><!-- df-example -->
                        </div>

                        {{-- Product Feature Image --}}
                        <div class="form-group">
                            <label for="formGroupExampleInput2" class="d-block"><b>Product Feature Image</b></label>
                            <div class="">
                                <input type="file" class="" id="imageUpload" name="feature_image" value="Upload Image">
                            </div>
                            <div id="" class="mg-t-20 avatar-preview img-thumbnail" style="display: none;"></div>
                            <div class="remove-image" style="display:none"><b>Remove image</b></div>
                        </div>

                        {{-- Product Status --}}
                        <div class="form-group">
                            <label class="d-block"><b>Product Status</b></label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="draft">Draft</option>
                                <option value="active">Active</option>
                                <option value="unavaliable">Unavaliable</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">

                        {{-- Product sku --}}
                        <div class="form-group">
                            <label class="d-block"><b>SKU</b></label>
                            <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror" value="{{old('sku')}}">
                            @error('sku')
                                <span class="invalid-feedback" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Product stock --}}
                        <div class="form-group">
                            <label class="d-block"><b>Stock*</b></label>
                            <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{old('stock')}}">
                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Product Price --}}
                        <div class="form-group">
                            <label class="d-block"><b>Product Price*</b></label>
                            <input type="number" name="price" step="any" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Product discount --}}
                        <div class="form-group">
                            <label class="d-block"><b>Product Discount (%)</b></label>
                            <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror" value="{{old('discount')}}" > 
                            @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Product discount start date --}}
                        <div class="form-group">
                            <label class="d-block"><b>Discount start Date</b></label>
                            <input type="date" name="discount_start" class="form-control @error('discount') is-invalid @enderror" value="{{old('discount_start')}}" >
                            @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Product discount end date --}}
                        <div class="form-group">
                            <label class="d-block"><b>Discount Dnd Date</b></label>
                            <input type="date" name="discount_end" class="form-control @error('discount') is-invalid @enderror" value="{{old('discount_end')}}">
                            @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">

                        {{-- Product description --}}
                        <div class="form-group">
                            <label class="d-block"><b>Product Description*</b></label>
                            <textarea name="description" id="" cols="30" rows="3" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Product excerpt --}}
                        <div class="form-group">
                            <label class="d-block"><b>Product Excerpt</b></label>
                            <textarea name="excerpt" id="" cols="30" rows="2" class="form-control">{{old('excerpt')}}</textarea>
                            @error('excerpt')
                                <span class="" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Meta Keyword --}}
                        <div class="form-group">
                            <label class="d-block"><b>Meta Keyword</b></label>
                            <textarea name="meta_keyword" id="" cols="30" rows="2" class="form-control">{{old('meta_keyword')}}</textarea>
                            @error('meta_keyword')
                                <span class="" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Meta Description --}}
                        <div class="form-group">
                            <label class="d-block"><b>Meta Description</b></label>
                            <textarea name="meta_description" id="" cols="30" rows="2" class="form-control">{{old('meta_description')}}</textarea>
                            @error('meta_description')
                                <span class="" role="alert">
                                    <strong><i>{{ $message }}</i></strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-xs" id="btnpublish">Save</button>
                <a href="{{route('product.index')}}" class="btn btn-dark btn-xs">Cancel</a>
            </form>
      </div>

    </div>

  </div>

</div>

@endsection


@section('modal')



@endsection


@section('javascript')
    <script src="{{asset('public/admin/lib/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('public/admin/lib/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>

  	<script>
        $(function(){
            'use strict'

            $('.select2').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search options'
            });



        });
  	</script>

@endsection
