<?php

namespace App\Http\Controllers\Digishop\Admin;

use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $brands = Brand::orderby('created_at','desc')->get();

            return Datatables::of($brands)
            ->editColumn('created_at',function(Brand $brand){
                    return $brand->created_at->diffForHumans();
                })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('brand.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('brand.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action'])
            ->make(true);


        }


        return view('digishop.admin.pages.brand.brand');

    }

    public function create()
    {
        return view('digishop.admin.pages.brand.brand_add');
    }

    public function store(BrandRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $brand = New Brand;
        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('brand.index')
        ->with([
            'message'    =>'Brand Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $brand = Brand::findOrFail($id);

        return response()->json($brand);
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        //return response()->json($brand);

        return view('digishop.admin.pages.brand.brand_edit',compact('brand'));
    }

    public function update(BrandRequest $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('brand.index')
        ->with([
            'message'    =>'Brand Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Brand::destroy($id);

        return response()->json(null, 204);
    }
}
