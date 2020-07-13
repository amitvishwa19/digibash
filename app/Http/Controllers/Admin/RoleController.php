<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        //$roles = Role::orderby('created_at','desc')->with('permissions')->get();
        //return $roles;
        if ($request->ajax()) {
            $roles = Role::orderby('created_at','desc')->get();

            return Datatables::of($roles)
            ->editColumn('created_at',function(Role $role){
                return $role->created_at->diffForHumans();
            })
            ->addColumn('permission',function($role){
                $permissions = $role->permissions;
                $perm = '';
                if($permissions){
                    foreach($permissions as $permission){
                        $perm = $perm. '<div class="badge badge-info mr-1" >'. $permission->name .'</div>';
                    };
                }
              
                return $perm;//$permission;
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('role.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';   
                        return $link;
                    })
            ->rawColumns(['permission','action'])
            ->make(true);


        }
        

        return view('admin.pages.role.role');

    }

    public function create()
    {
        $permissions = Permission::get();
        return view('admin.pages.role.role_add',compact('permissions'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $role = New Role;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        $role->syncPermissions($request->permissions);

        return redirect()->route('role.index')
        ->with([
            'message'    =>'Role Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
    }

    public function edit($id)
    {
        $role = Role::where('id',$id)->with('permissions')->first();
        $permissions = Permission::get();
        return view('admin.pages.role.role_edit',compact('role','permissions'));
    }

    public function update(Request $request, $id)
    {
        //return $request->permissions;
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        
        $role->syncPermissions($request->permissions);

        return redirect()->route('role.index')
        ->with([
            'message'    =>'Role Updated Successfully',
            'alert-type' => 'success',
        ]);

        
    }

    public function destroy($id)
    {
        Role::destroy($id);

        return response()->json(null, 204);
    }
}