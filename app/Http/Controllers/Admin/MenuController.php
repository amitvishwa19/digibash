<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $item = $request->selectedmenu;
        $menus = Menu::latest()->get();
      
        return view('admin.pages.menu.menu',compact('menus','item'));

        //return response()->json($menus);
    }

    public function create()
    {
        $menus = Menu::latest()->get();

        return response()->json($menus);
    }

    public function store(MenuRequest $request)
    {
        $menu = Menu::create($request->all());

        return response()->json($menu, 201);
    }

    public function selectMenu(Request $request)
    {
        //dd($request->selectedmenu);
        $item = $request->selectedmenu;
        //dd( $item);
        $menus = Menu::latest()->get();
        return view('admin.pages.menu.menu',compact('menus','item'));
    }

    public function show($id)
    {
        return `Show menu $id`;
        $menu = Menu::findOrFail($id);

        return response()->json($menu);
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        //return response()->json($menu);

        return view('admin.pages.menu.menu_edit',compact('menu'));
    }

    public function update(MenuRequest $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return response()->json($menu, 200);
    }

    public function destroy($id)
    {
        Menu::destroy($id);

        return response()->json(null, 204);
    }
}