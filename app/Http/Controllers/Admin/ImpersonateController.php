<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Impersonate;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\ImpersonateRequest;

class ImpersonateController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $users = User::orderby('created_at','desc')->latest('id');

            return Datatables::of($users)
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
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('impersonate.enter',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Impersonate</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','roles','name','status'])
            ->make(true);


        }


        return view('admin.pages.impersonate.impersonate');

    }

    public function impersonate($user_id)
    {
        $user = User::findOrFail($user_id);
        Auth::user()->impersonate($user);
        return redirect()->back()
        ->with([
            'message'    =>'Successfully Impersonated as ' . $user->firstname . ',' . $user->lastname,
            'alert-type' => 'success',
        ]);
    }

    public function impersonate_leave()
    {
        Auth::user()->leaveImpersonation();
        return redirect()->route('app.admin.home');
    }
}
