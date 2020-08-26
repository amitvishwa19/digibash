<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        //$sections = Section::orderby('created_at','desc')->latest('id');
        //dd($sections);
        if ($request->ajax()) {
            $sections = Section::orderby('created_at','desc')->latest('id');

            return Datatables::of($sections)
            ->editColumn('created_at',function(Section $section){
                return $section->created_at->diffForHumans();
            })
            ->addColumn('status',function(Section $section){
                if($section->status == true){
                    return '<div class="badge badge-success">Active</div>';
                }else{
                    return '<div class="badge badge-warning">InActive</div>';
                }
            })
            ->addColumn('courses',function(Section $section){
                $courses = $section->courses;
                $crs = '';
                if($courses){
                    foreach($courses as $course){
                       $crs = $crs. '<div class="badge badge-info mr-1" >'. $course->name .'</div>';
                    };
                }
                return $crs;
            })
            ->addColumn('teachers',function(Section $section){
                $teachers = $section->teachers;
                $tcr = '';
                if($teachers){
                    foreach($teachers as $teacher){
                       $tcr = $tcr. '<div class="badge badge-info mr-1" >'. $teacher->user->firstname .','.$teacher->user->lastname.'</div>';
                    };
                }
                return $tcr;
            })
            ->addColumn('students',function(Section $section){
                return $section->students->count();
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('section.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('section.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','status','courses','teachers'])
            ->make(true);


        }


        return view('admin.pages.section.section');

    }

    public function create()
    {
        $courses = Course::where('status',true)->get();
        $teachers = Teacher::with('user')->get();
        //dd($teachers);
        return view('admin.pages.section.section_add',compact('courses','teachers'));
    }

    public function store(SectionRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $section = New Section;
        $section->name = $request->name;
        $section->description = $request->description;
        $section->status = $request->status;
        $section->save();

        $section->courses()->sync($request->courses);

        $section->teachers()->sync($request->teachers);

        return redirect()->route('section.index')
        ->with([
            'message'    =>'Section Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $section = Section::findOrFail($id);

        return response()->json($section);
    }

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        $courses = Course::where('status',true)->get();
        $teachers = Teacher::with('user')->get();
        //return response()->json($section);

        return view('admin.pages.section.section_edit',compact('section','courses','teachers'));
    }

    public function update(SectionRequest $request, $id)
    {
        //dd($request->courses);
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $section = Section::findOrFail($id);
        $section->name = $request->name;
        $section->description = $request->description;
        $section->status = $request->status;
        $section->save();

        $section->courses()->sync($request->courses);

        $section->teachers()->sync($request->teachers);

        return redirect()->route('section.index')
        ->with([
            'message'    =>'Section Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Section::destroy($id);

        return response()->json(null, 204);
    }
}
