<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function _construct(){
        if (! Gate::allows('manage_role')) {
            return abort(401);
        }
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::orderby('created_at','desc')->get();

            return Datatables::of($users)
            ->editColumn('created_at',function(User $user){
                return $user->created_at->diffForHumans();
            })
            ->addColumn('name',function($user){
                return $user->firstname .','. $user->lastname;
            })
            ->addColumn('roles',function($user){
                $roles = $user->roles;
                $rl ='';
                if($roles){
                    foreach($roles as $role){
                       $rl = $rl. '<div class="badge badge-info mr-1" >'. $role->name .'</div>';
                    };
                }
                return $rl;
            })
            ->addColumn('status',function(User $user){
                if($user->status == true){
                    return '<div class="badge badge-success">Active</div>';
                }else{
                    return '<div class="badge badge-warning">InActive</div>';
                }
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('user.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','roles','name','status'])
            ->make(true);


        }


        return view('admin.pages.user.user');

    }

    public function create()
    {
        $roles = Role::get();
        return view('admin.pages.user.user_add',compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required'
        ]);

        $user = New User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->status = $request->status;
        $user->save();

        $user->syncRoles($request->roles);

        return redirect()->route('user.index')
        ->with([
            'message'    =>'User Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->with('roles')->first();
        $roles = Role::get();

        return view('admin.pages.user.user_edit',compact('user','roles'));
    }

    public function update(UserRequest $request, $id)
    {

        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->status = $request->status;
        $user->save();


        $user->syncRoles($request->roles);

        return redirect()->route('user.index')
        ->with([
            'message'    =>'User Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(null, 204);
    }
}
