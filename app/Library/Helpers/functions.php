<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Response;




if (! function_exists('posts')) {
    function posts($categories = null, $count = null){

        if($categories){
            $posts = collect([]);
            foreach ($categories as $key => $category) {
                $p = Post::where('status','published')
                        ->with('categories')
                        ->whereHas('categories',function($q) use ($category){
                            $q->where('slug','=',$category);
                        })->get();
                $posts = $posts->concat($p);
            }
        }else{
            $post = Post::where('status','published')->get();
        }
        
        if($count){
            return $posts = $posts->take($count);
        }else{
            return $post;
        }
    }
}

if (! function_exists('products')) {
    function products($category = null, $count = null){
        if($count){
            $products = Product::take($count)->get();
        }else{
            $products = Product::get();
        }
        return $products;
    }
}

if(! function_exists('category')){
    function category($parent_category = null){
        if($parent_category){
           $parent_id = Category::where('slug',$parent_category)->first();
           $categories = Category::with(['childs'=>function($q){
                $q->where('status','=',1);
           }])->where('id',$parent_id->id)->get();
        }else{
            $categories = Category::with('childs')->where('parent_id',null)->where('status',true)->get();
        }
        return $categories;
        //return $categories->toJson(JSON_PRETTY_PRINT);

    }
}

if(! function_exists('uploadImage')){
    function uploadImage($image = nulls){

        //Create Uploads Folder
        if(!File::exists(public_path('admin\uploads'))){
            File::makeDirectory(public_path('admin\uploads'));
        }

        if(!$image){ return 'Please provide image';}


        $image_name = time().'_'.$image->getClientOriginalName();
        $img = Image::make($image);
        $img->save(public_path('admin\uploads').'/'.$image_name);
        return url('public/admin/uploads/'. $image_name) ;
    }
}


