<?php

namespace App\Http\Controllers\Lms;

use App\Models\Exam;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $lessons = Lesson::orderby('created_at','desc')->get();

            return Datatables::of($lessons)
            ->editColumn('created_at',function(Lesson $lesson){
                return $lesson->created_at->diffForHumans();
            })
            ->editColumn('feature_image',function(Lesson $lesson){
                return '<div class="avatar avatar-md"><img src="'.$lesson->feature_image.'" alt="" class="rounded"></div>';
            })
            ->addColumn('status',function(Lesson $lesson){
                if($lesson->status == true){
                    return '<div class="badge badge-success">Published</div>';
                }else{
                    return '<div class="badge badge-warning">Draft</div>';
                }
            })
            ->addColumn('courses',function(Lesson $lesson){
                $courses = $lesson->courses;
                $crs = '';
                if($courses){
                    foreach($courses as $course){
                       $crs = $crs. '<a href="'.route('course.show',$course->id).'"><div class="badge badge-info mr-1" >'. $course->name .'</div></a>';
                    };
                }
                return $crs;
            })
            ->addColumn('exams',function(Lesson $lesson){
                $exams = $lesson->exams;
                $exm = '';
                if($exams){
                    foreach($exams as $exam){
                       $exm = $exm. '<a href="'.route('exam.show',$exam->id).'" ><div class="badge badge-info mr-1" >'. $exam->title .'</div></a>';
                    };
                }
                return $exm;
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('lesson.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('lesson.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','feature_image','status','courses','exams'])
            ->make(true);


        }


        return view('lms.pages.lesson.lesson');

    }

    public function create()
    {
        $courses = Course:: orderby('id','desc')->where('status',true)->get();
        $exams = Exam:: orderby('id','desc')->where('status',true)->get();
        return view('lms.pages.lesson.lesson_add',compact('courses','exams'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'author' => 'required',

        ],[
            'courses.required' => 'Please select at least on course to add a lesson to it..'
        ]);

        //return $request->all();

        $lesson = New Lesson;
        $lesson->title = $request->title;
        $lesson->slug = Str::slug($request->title,'-');
        $lesson->description = $request->description;
        $lesson->content = $request->content;
        $lesson->author = $request->author;
        $lesson->price = $request->price;
        $lesson->status = $request->status;
        if($lesson->free = 'on'){
            $lesson->free = 1;
        }
        $lesson->save();

        $lesson->courses()->sync($request->courses);

        return redirect()->route('lesson.index')
        ->with([
            'message'    =>'Lesson Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lms.pages.lesson.lesson_view',compact('lesson'));
        return response()->json($lesson);
    }

    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $courses = Course:: orderby('id','desc')->where('status',true)->get();
        $exams = Exam:: orderby('id','desc')->where('status',true)->get();
        //return response()->json($lesson);

        return view('lms.pages.lesson.lesson_edit',compact('lesson','courses','exams'));
    }

    public function update(Request $request, $id)
    {

        $validate = $request->validate([
            'title' => 'required',
            'author' => 'required',

        ],[
            'courses.required' => 'Please select at least on course to add a lesson to it..'
        ]);

        $lesson = Lesson::findOrFail($id);
        $lesson->title = $request->title;
        $lesson->slug = Str::slug($request->title,'-');
        $lesson->description = $request->description;
        $lesson->content = $request->content;
        $lesson->author = $request->author;
        $lesson->price = $request->price;
        $lesson->status = $request->status;
        if($lesson->free = 'on'){
            $lesson->free = 1;
        }
        $lesson->save();

        $lesson->courses()->sync($request->courses);

        $lesson->exams()->sync($request->exams);

        return redirect()->route('lesson.index')
        ->with([
            'message'    =>'Lesson Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        $lesson = Lesson::destroy($id);
        //$lesson->courses()->detach();
        return response()->json(null, 204);
    }
}
