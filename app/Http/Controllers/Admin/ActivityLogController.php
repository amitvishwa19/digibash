<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Yajra\Datatables\Datatables;

class ActivityLogController extends Controller
{

    public function index(Request $request)
    {

        // if(Auth::user()->hasRole('Super Admin')){
        //     $activities = Activity::all()->reverse();
        // }else{
        //     $activities = auth()->user()->actions->load('causer')->reverse();
        // }
        //dd(Activity::all()->reverse());
        if ($request->ajax()) {
            $activities = Activity::latest('id');

            return Datatables::of($activities)

            ->editColumn('created_at',function(Activity $activity){
                return $activity->created_at->diffForHumans();
            })
            ->addColumn('checkbox', '<input type="checkbox" name="id" class="checkbox" value="{{$id}}"/>')
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','checkbox'])
            ->make(true);

        }

        return view('admin.pages.activity-log.activity_log');

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        if(is_array($id)){
            return 'is array';
        }else{
            return 'Not array';
            //Activity::destroy($id);
            //return response()->json(null, 204);
        }

    }

    public function deleteAll($id)
    {
        $id = explode(',', $id);
        foreach($id as $i){
            Activity::destroy($id);
        }
        return response()->json(null, 204);
    }

}
