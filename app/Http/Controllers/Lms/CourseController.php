<?php

namespace App\Http\Controllers\Lms;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

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
                    return '<div class="badge badge-success">Active</div>';
                }else{
                    return '<div class="badge badge-warning">InActive</div>';
                }
            })
            ->addColumn('lesson',function(Course $course){
                return $course->lessons->count();
            })
            ->addColumn('exams',function(Course $course){
                //return $course->lessons->exams->count();
                $lessons = $course->lessons;
                $exm = 0;
                if($lessons){
                    foreach($lessons as $lesson){
                       $exm  = $exm + $lesson->exams->count();
                    };
                }
                return $exm;
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


        return view('lms.pages.course.course');

    }

    public function create()
    {
        $lessons = lesson::orderby('created_at','desc')->get();
        return view('lms.pages.course.course_add',compact('lessons'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $course = New Course;
        $course->name = $request->name;
        $course->description = $request->description;
        $course->status = $request->status;
        $course->save();

        $course->lessons()->sync($request->lessons);

        return redirect()->route('course.index')
        ->with([
            'message'    =>'Course Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        $lessons = Lesson::orderby('id','desc')->where('id',$id)->get();
        return view('lms.pages.course.course_view',compact('lessons','course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $lessons = lesson::orderby('created_at','desc')->get();
        //return response()->json($course);

        return view('lms.pages.course.course_edit',compact('course','lessons'));
    }

    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $course = Course::findOrFail($id);
        $course->name = $request->name;
        $course->description = $request->description;
        $course->status = $request->status;
        $course->save();

        $course->lessons()->sync($request->lessons);

        //$lesson->courses()->sync($request->courses);

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
