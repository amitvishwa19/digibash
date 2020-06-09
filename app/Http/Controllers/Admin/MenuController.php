<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Post;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index(Request $request)
    {   

        if ($request->ajax()) {
            $menus = Menu::latest()->get();
            $menus = Menu::orderby('created_at','desc')->get();
            return Datatables::of($menus)
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('menu.builder',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">Builder</a>'.
                                    '<a href="'.route('menu.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';   
                        return $link;
                    })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        return view('admin.pages.menu.menu');

    }

    public function create()
    {
        return view('admin.pages.menu.menu_add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:menus,name'
        ]);
        $menu = new Menu;
        $menu->name = $request->name;
        $menu->save();
     
        return redirect()->route('menu.index')
        ->with([
            'message'    =>'Menu Added Successfully',
            'alert-type' => 'success',
        ]);
    
    }

    public function show(Request $request,$id)
    {
        $menu = Menu::findOrFail(1);
        return $menu_items = menu($menu->name);
        return response()->json($menu_items);
        
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.pages.menu.menu_edit',compact('menu'));
    }

    public function update(Request $request, $id)
    {       
            $validate = $request->validate([
                'name' => 'required'
            ]);
            $menu = Menu::findOrFail($id);
            $menu->name = $request->name;
            $menu->save();
            return redirect()->route('menu.index')
            ->with([
                'message'    =>'Menu Updated Successfully',
                'alert-type' => 'success',
            ]);      

    }

    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect()->route('menu.index')->with('danger','Menu Deleted successfully');
    }

    public function builder($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.pages.menu.menubuilder',compact('menu'));
    }

    public function addMenuItem_create($id)
    {   
       
        return view('admin.pages.menu.menubuilder_add',compact('id'));
    }

    public function addMenuItem(Request $request)
    {   
        //return $request->all();
        

        $validate = $request->validate([
            'title' => 'required'
        ]);
        
        $menuItem = new MenuItem;
        $menuItem->menu_id = $request->menu_id;
        $menuItem->title = $request->title;

        if($request->link_type == 'route'){
            $menuItem->url = '';
            $menuItem->route = $request->url;
        }else{
            $menuItem->url = $request->url;
        }
        $menuItem->class = $request->class;
        $menuItem->icon_class = $request->icon_class;
        $menuItem->target = $request->target;
        $menuItem->order = $menuItem->highestOrderMenuItem();
        $menuItem->save();

        //return $request->all();
        return redirect()->route('menu.builder',['menu'=>$request->menu_id])
        ->with([
            'message'    =>'Menu Item Added Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function editMenuItem($menu,$id)
    {
        $menuitem = MenuItem::findOrFail($id);
        return view('admin.pages.menu.menubuilder_edit',compact('menuitem'));
    }

    public function updateMenuItem(Request $request)
    {   
        
        $validate = $request->validate([
            'title' => 'required'
        ]);

        $menuItem = MenuItem::findOrFail($request->menu_item_id);
        $menuItem->title = $request->title;

        if($request->link_type == 'route'){
            $menuItem->url = null;
            $menuItem->route = $request->url;
        }else{
            $menuItem->url = $request->url;
            $menuItem->route = null;
        }
        $menuItem->class = $request->class;
        $menuItem->icon_class = $request->icon_class;
        $menuItem->target = $request->target;
        $menuItem->save();
        return redirect()->route('menu.builder',['menu'=>$request->menu_id])
        ->with([
            'message'    =>'Menu Item Updated Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function deleteMenuItem(Request $request)
    {
        //return $request->itemid;
        MenuItem::destroy($request->itemid);
        return 'deleted successfully';
        //return redirect()->route('menu.builder',['menu'=>$id])->with('danger','Menu Item Deleted successfully');
    }

    protected function prepareParameters($parameters)
    {
        switch (Arr::get($parameters, 'type')) {
            case 'route':
                $parameters['url'] = null;
                break;
            default:
                $parameters['route'] = null;
                $parameters['parameters'] = '';
                break;
        }

        if (isset($parameters['type'])) {
            unset($parameters['type']);
        }

        return $parameters;
    }

    public function order_item(Request $request)
    {
        $menuItemOrder = json_decode($request->input('order'));
        $this->orderMenu($menuItemOrder, null);
    }

    private function orderMenu(array $menuItems, $parentId)
    {
        foreach ($menuItems as $index => $menuItem) {
            $item = MenuItem::findOrFail($menuItem->id);
            $item->order = $index + 1;
            $item->parent_id = $parentId;
            $item->save();

            if (isset($menuItem->children)) {
                $this->orderMenu($menuItem->children, $item->id);
            }
        }
    }


}