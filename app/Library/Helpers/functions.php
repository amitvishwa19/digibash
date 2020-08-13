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
    function uploadImage($image = null,$path = null){
        if(!$image){ return 'Please provide image';}
        $image_name = time().'_'.$image->getClientOriginalName();
        $path = 'uploads/images';
        // $img = Image::make($image);
        // $img->save(public_path('uploads').'/'.$image_name);
        // return url('public/uploads/'. $image_name) ;
        $image->storeAs($path, $image_name, 'public');
        $url = $path .'/'. $image_name;
        return $url;
    }
}

if(! function_exists('url_link')){
    function url_link($path = null){
        if(!$path){ return 'Please provide a valid path';}
        return url($path);
    }
}

if(! function_exists('upload_media')){
    function upload_media($image = null,$path = null){
        if(!$image){ return 'Please provide image';}

        return array('name'=>'file_name','ssASA'=>'adasdasd');
    }
}


