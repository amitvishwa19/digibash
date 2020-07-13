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

        $categories = Category::with('childs')->where('parent_id',null)->get();

        // $categories = Cache::rememberForever('categories', function () {
        //     $categories = Category::with('childs')->where('parent_id',null)->get();
        // });
        //return $categories;
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
            $category->parent_id = null;
        }else{
            $category->parent_id = $request->parent;
        }
        $category->class = $request->class;
        $category->icon_class = $request->icon_class;
        $category->status = $request->status;
        $category->save();
        Cache::forget('categories');

        return redirect() ->route('category.index')
        ->with([
            'message'    =>'Category Created Successfully',
            'alert-type' => 'success',
        ]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $categories = Category::with('childs')->where('parent_id',null)->get();
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
            $category->parent_id = null;
        }else{
            $category->parent_id = $request->parent;
        }
        $category->class = $request->class;
        $category->icon_class = $request->icon_class;
        $category->status = $request->status;
        $cat_save = $category->save();
        Cache::forget('categories');

        if($cat_save){
            return redirect() ->route('category.index')
            ->with([
                'message'    =>'Category Updated Successfully',
                'alert-type' => 'success',
            ]);
        }
    }


    public function destroy($id)
    {

        $category = Category::find($id);

        if($category->child){
            foreach($category->child as $child){

            }
        }

        $category->delete();

        Cache::forget('categories');
        return response()->json(null, 204);

    }

    public function order_item(Request $request)
    {
        $categoryItemOrder = json_decode($request->input('order'));
        $this->orderCategory($categoryItemOrder, null);
    }

    private function orderCategory(array $menuItems, $parentId)
    {

        foreach ($menuItems as $index => $menuItem) {
            $item = Category::findOrFail($menuItem->id);
            $item->order = $index + 1;
            $item->parent_id = $parentId;
            $item->save();

            if (isset($menuItem->children)) {
               $this->orderCategory($menuItem->children, $item->id);
            }
        }
    }
}
