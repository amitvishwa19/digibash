<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        //return auth()->user()->shops()->with('products')->latest('id')->all()->pluck('products')->flatten();
        if ($request->ajax()) {
            //$products = Product::orderby('created_at','desc')->get();

            if(auth()->user()->can('view_all_shops')){
                //$products = Product::orderby('created_at','desc')->with('categories')->latest('id');
                $products = auth()->user()->shops()->with('products')->latest()->get()->pluck('products')->flatten();
            }else{
                $products = auth()->user()->shops()->with('products')->latest()->get()->pluck('products')->flatten();
            }

            return Datatables::of($products)
            ->editColumn('created_at',function(Product $product){
                return $product->created_at->diffForHumans();
            })
            ->editColumn('shop',function(Product $product){
                return $product->shop->name;
            })
            ->editColumn('categories',function(Product $product){
                $cat = '';
                if($product->categories)
                {
                    foreach($product->categories as $category){
                        $cat = $cat. '<div class="badge badge-info mr-1" >'. $category->name .'</div>';
                    };
                }
                return  $cat;
            })
            ->editColumn('stock',function(Product $product){
                return  number_format($product->stock, 0);
            })
            ->editColumn('price',function(Product $product){
                return  '₹' . ' ' . number_format($product->price, 2);
            })
            ->editColumn('discount',function(Product $product){
                return $product->discount ? $product->discount . '%' : '--';
            })
            ->addColumn('status',function(Product $product){
                if($product->shop->status == 'disabled'){
                    return '<div class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="!!! Shop is Disabled !!!">Unavaliable</div>';
                }else{
                    if($product->status == 'draft'){
                        return '<div class="badge badge-info">Draft</div>';
                    }elseif($product->status == 'active'){
                        return '<div class="badge badge-success">Active</div>';
                    }else{
                        return '<div class="badge badge-warning">Unavaliable</div>';
                    }
                }

            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('product.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('product.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })

            ->rawColumns(['action','status','price','shop','categories'])
            ->make(true);


        }


        return view('admin.pages.product.product');
    }

    public function create()
    {
        $categories = Category::where('parent_id','<>', 0 )->orderby('created_at','desc')->get();
        return view('admin.pages.product.product_add',compact('categories'));
    }

    public function store(ProductRequest $request)
    {

        $validate = $request->validate([
            'name' => 'required',
            'shop_id' => 'required|integer',
            'stock' => 'required|integer',
            'price' => 'required|numeric|gt:0',
        ],[
            'name.required' => 'Product name is required',
            'shop_id.required' => 'Select a shop to post Product under selected Shop',
            'stock.required' => 'Please provide valid Stock(s) the product',
            'price.required' => 'Please provide valid Price the product',
        ]);

        $product = New Product;
        $product->shop_id = $request->shop_id;
        $product->name = $request->name;
        $product->slug =  Str::slug($request->name,'-');
        $product->description = $request->description;
        $product->excerpt = $request->excerpt;
        $product->sku = $request->sku;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->feature_image = uploadImage($request->feature_image);
        $product->discount = $request->discount;
        $product->discount_start = $request->discount_start;
        $product->discount_end = $request->discount_end;
        $product->status = $request->status;
        $product->meta_keywords = $request->meta_keyword;
        $product->meta_description = $request->meta_description;
        $product->save();

        //Categoty Saving
        if(!$request->categories){
           $product->categories()->sync([$this->defaultCategory()]);
        }else{
           $product->categories()->sync($request->categories);
        }

        //Saving Tags
        $tagIds = [];
        if($request->tags){
            $tags = $request->tags;
            foreach($tags as $tag){
                $ntag = Tag::firstOrCreate(['name'=>$tag,'slug'=>str_slug( $tag)]);
                if($tag)
                {
                    $tagIds[] = $ntag->id;
                }
            }
        }
        $product->tags()->sync($tagIds);

        return redirect()->route('product.index')->with(['message' => 'Product Added Successfully', 'alert-type' => 'success']);

    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    public function edit($id)
    {
        $categories = Category::where('parent_id','<>', 0 )->orderby('created_at','desc')->get();
        $tags = Tag::orderby('created_at','desc')->get();
        $product = Product::findOrFail($id);
        return view('admin.pages.product.product_edit',compact('product','categories','tags'));
    }

    public function update(ProductRequest $request, $id)
    {
      
        $validate = $request->validate([
            'name' => 'required',
            'shop_id' => 'required|integer',
            'stock' => 'required|integer',
            'price' => 'required|numeric|gt:0',
        ],[
            'name.required' => 'Product name is required',
            'shop_id.required' => 'Select a shop to post Product under selected Shop',
            'stock.required' => 'Please provide valid Stock(s) the product',
            'price.required' => 'Please provide valid Price the product',
        ]);

        $product = Product::findOrFail($id);
        $product->shop_id = $request->shop_id;
        $product->name = $request->name;
        $product->slug =  Str::slug($request->name,'-');
        $product->description = $request->description;
        $product->excerpt = $request->excerpt;
        $product->sku = $request->sku;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->feature_image = uploadImage($request->feature_image);
        $product->discount = $request->discount;
        $product->discount_start = $request->discount_start;
        $product->discount_end = $request->discount_end;
        $product->status = $request->status;
        $product->meta_keywords = $request->meta_keyword;
        $product->meta_description = $request->meta_description;
        $product->save();

        //Categoty Saving
        if(!$request->categories){
            $product->categories()->sync([$this->defaultCategory()]);
        }else{
        $product->categories()->sync($request->categories);
        }

        //Saving Tags
        $tagIds = [];
        if($request->tags){
            $tags = $request->tags;
            foreach($tags as $tag){
                $ntag = Tag::firstOrCreate(['name'=>$tag,'slug'=>str_slug( $tag)]);
                if($tag)
                {
                    $tagIds[] = $ntag->id;
                }
            }
        }
        $product->tags()->sync($tagIds);

        return redirect()->route('product.index')
        ->with([
            'message'    =>'Product Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(null, 204);
    }

    public function defaultCategory()
    {
        $category = Category::where('slug','uncategorized')->first();
        if(!$category){
            $category = new Category;
            $category->name = 'Uncategorized';
            $category->slug = 'uncategorized';
            $category->save();

        }
        return $category->id;
    }
}
