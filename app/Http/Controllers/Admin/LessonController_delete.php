<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LessonRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Lesson;

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
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('lesson.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('lesson.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','feature_image'])
            ->make(true);


        }


        return view('admin.pages.lesson.lesson');

    }

    public function create()
    {
        return view('admin.pages.lesson.lesson_add');
    }

    public function store(LessonRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $lesson = New Lesson;
        $lesson->name = $request->name;
        $lesson->save();

        return redirect()->route('lesson.index')
        ->with([
            'message'    =>'Lesson Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);

        return response()->json($lesson);
    }

    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);

        //return response()->json($lesson);

        return view('admin.pages.lesson.lesson_edit',compact('lesson'));
    }

    public function update(LessonRequest $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $lesson = Lesson::findOrFail($id);
        $lesson->name = $request->name;
        $lesson->save();

        return redirect()->route('lesson.index')
        ->with([
            'message'    =>'Lesson Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Lesson::destroy($id);

        return response()->json(null, 204);
    }
}
