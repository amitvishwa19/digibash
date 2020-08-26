<?php

namespace App\Http\Controllers\Lms;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\ExamRequest;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $exams = Exam::orderby('created_at','desc')->latest('id');

            return Datatables::of($exams)
            ->editColumn('created_at',function(Exam $exam){
                return $exam->created_at->diffForHumans();
            })
            ->addColumn('questions',function(Exam $exam){
                return $exam->questions->count();
            })
            ->addColumn('status',function(Exam $exam){
                if($exam->status == true){
                    return '<div class="badge badge-success">Published</div>';
                }else{
                    return '<div class="badge badge-warning">Draft</div>';
                }
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('exam.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('exam.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','status'])
            ->make(true);


        }


        return view('lms.pages.exam.exam');

    }

    public function create()
    {
        $questions = Question::orderby('created_at','desc')->where('status',true)->get();
        return view('lms.pages.exam.exam_add',compact('questions'));
    }

    public function store(ExamRequest $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $exam = New Exam;
        $exam->title = $request->title;
        $exam->description = $request->description;
        $exam->start_date = $request->start_date;
        $exam->end_date = $request->end_date;
        $exam->status = $request->status;
        $exam->save();

        $exam->questions()->sync($request->questions);

        return redirect()->route('exam.index')
        ->with([
            'message'    =>'Exam Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $exam = Exam::findOrFail($id);

        return response()->json($exam);
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $questions = Question::orderby('created_at','desc')->where('status',true)->get();

        //return response()->json($exam);

        return view('lms.pages.exam.exam_edit',compact('exam','questions'));
    }

    public function update(ExamRequest $request, $id)
    {

        $validate = $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);


        $exam = Exam::findOrFail($id);
        $exam->title = $request->title;
        $exam->description = $request->description;
        $exam->start_date = $request->start_date;
        $exam->end_date = $request->end_date;
        $exam->status = $request->status;
        $exam->save();

        $exam->questions()->sync($request->questions);

        return redirect()->route('exam.index')
        ->with([
            'message'    =>'Exam Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Exam::destroy($id);

        return response()->json(null, 204);
    }
}
