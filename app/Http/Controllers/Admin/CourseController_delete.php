<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $courses = Course::orderby('created_at','desc')->latest('id');

            return Datatables::of($courses)
            ->editColumn('created_at',function(Course $course){
                return $course->created_at->diffForHumans();
            })
            ->addColumn('status',function(Course $course){
                if($course->status == true){
                    return '<div class="badge badge-success">Active <span class="badge badge-success"> '.$course->lessons->count().' </span></div>';
                }else{
                    return '<div class="badge badge-warning">InActive</div>';
                }
            })
            ->addColumn('lesson',function(Course $course){
                return $course->lessons->count();
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('course.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('course.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','status'])
            ->make(true);


        }


        return view('admin.pages.course.course');

    }

    public function create()
    {
        return view('admin.pages.course.course_add');
    }

    public function store(CourseRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $course = New Course;
        $course->name = $request->name;
        $course->description = $request->description;
        $course->status = $request->status;
        $course->save();

        return redirect()->route('course.index')
        ->with([
            'message'    =>'Course Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $lessons = Lesson::orderby('id','desc')->where('course_id',$id)->get();
        return view('admin.pages.course.course_view',compact('lessons'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        //return response()->json($course);

        return view('admin.pages.course.course_edit',compact('course'));
    }

    public function update(CourseRequest $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $course = Course::findOrFail($id);
        $course->name = $request->name;
        $course->description = $request->description;
        $course->status = $request->status;
        $course->save();

        return redirect()->route('course.index')
        ->with([
            'message'    =>'Course Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Course::destroy($id);

        return response()->json(null, 204);
    }
}
