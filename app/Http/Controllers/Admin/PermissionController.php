<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $permissions = Permission::orderby('created_at','desc')->get();

            return Datatables::of($permissions)
            ->editColumn('created_at',function(Permission $permission){
                    return $permission->created_at->diffForHumans();
                })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('permission.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';   
                        return $link;
                    })
            ->rawColumns(['action'])
            ->make(true);


        }
        

        return view('admin.pages.permission.permission');

    }

    public function create()
    {
        return view('admin.pages.permission.permission_add');
    }

    public function store(PermissionRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:permissions|max:255'
        ]);

        $permission = New Permission;
        $permission->name = $request->name;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->route('permission.index')
        ->with([
            'message'    =>'Permission Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return response()->json($permission);
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        //return response()->json($permission);

        return view('admin.pages.permission.permission_edit',compact('permission'));
    }

    public function update(PermissionRequest $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required|unique:permissions|max:255'
        ]);

        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('permission.index')
        ->with([
            'message'    =>'Permission Updated Successfully',
            'alert-type' => 'success',
        ]);

        
    }

    public function destroy($id)
    {
        Permission::destroy($id);

        return response()->json(null, 204);
    }
}