<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    
    public function index()
    {

        //$categories = Category::with('childrenRecursive')->where('parent_id',0)->orderby('created_at','desc')->get();

        $categories = Cache::rememberForever('categories', function () {
            return Category::with('childrenRecursive')->where('parent_id',0)->orderby('created_at','desc')->get();
        });

        return view('admin.pages.category.category',compact('categories'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {   
        $validate = $request->validate([
            'category' => 'required|unique:categories,name'
        ]);


        $category = new Category;
        $category->name = $request->category;
        $category->slug = str_slug($request->category);
        if($request->parent == null){
            $category->parent_id = '0';
        }else{
            $category->parent_id = $request->parent;
        }
        
        $category->save();
        Cache::forget('categories');

        return redirect() ->route('category.index')->with('success','Category saved successfully');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $categories = Cache::rememberForever('categories', function () {
            return Category::with('childrenRecursive')->where('parent_id',0)->orderby('created_at','desc')->get();
        });
        $category = Category::findOrFail($id);
        return view('admin.pages.category.category_edit',compact('categories','category'));
    }

    
    public function update(Request $request, $id)
    {
        //return $request->all();
        $category = Category::find($id);
        $category->name = $request->category;
        $category->slug = str_slug( $request->category);
        if($request->parent == null){
            $category->parent_id = '0';
        }else{
            $category->parent_id = $request->parent;
        }
        $cat_save = $category->save();
        Cache::forget('categories');
        
        if($cat_save){
            return redirect() ->route('category.index')->with('success','Category saved successfully');
        }
    }

    
    public function destroy($id)
    {   
        
        $category = Category::find($id);

        if($category->child){
            foreach($category->child as $child){

            }
        }

        
        $is_deleted=$category->delete();
        
        Cache::forget('categories');

        if($is_deleted){
            return redirect() ->route('category.index')->with('success','Category deleted successfully');
        }
    }
}
