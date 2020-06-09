<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TestRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Test;

class TestController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tests = Test::orderby('created_at','desc')->get();

            return Datatables::of($tests)
            ->editColumn('created_at',function(Test $test){
                    return $test->created_at->diffForHumans();
                })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('test.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('test.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';   
                        return $link;
                    })
            ->rawColumns(['action'])
            ->make(true);


        }
        

        return view('admin.pages.test.test');

    }

    public function create()
    {
        return view('admin.pages.test.test_add');
    }

    public function store(TestRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $test = New Test;
        $test->name = $request->name;
        $test->save();

        return redirect()->route('test.index')
        ->with([
            'message'    =>'Test Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $test = Test::findOrFail($id);

        return response()->json($test);
    }

    public function edit($id)
    {
        $test = Test::findOrFail($id);

        //return response()->json($test);

        return view('admin.pages.test.test_edit',compact('test'));
    }

    public function update(TestRequest $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $test = Test::findOrFail($id);
        $test->name = $request->name;
        $test->save();

        return redirect()->route('test.index')
        ->with([
            'message'    =>'Test Updated Successfully',
            'alert-type' => 'success',
        ]);

        
    }

    public function destroy($id)
    {
        Test::destroy($id);

        return response()->json(null, 204);
    }
}