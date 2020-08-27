<?php

namespace App\Http\Controllers\Lms;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionOption;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $questions = Question::orderby('created_at','desc')->latest('id');

            return Datatables::of($questions)
            ->editColumn('created_at',function(Question $question){
                return $question->created_at->diffForHumans();
            })
            ->addColumn('exams',function(Question $question){
                $exams = $question->exams;
                $exm = '';
                if($exams){
                    foreach($exams as $exam){
                        $exm = $exm. '<a href="'.route('exam.show',$exam->id).'" ><div class="badge badge-info mr-1" >'. $exam->title .'</div></a>';
                    };
                }
                return $exm;
            })
            ->addColumn('status',function(Question $question){
                if($question->status == true){
                    return '<div class="badge badge-success">Published</div>';
                }else{
                    return '<div class="badge badge-warning">Draft</div>';
                }
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('question.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('question.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','status','exams'])
            ->make(true);


        }


        return view('lms.pages.question.question');

    }

    public function create()
    {
        return view('lms.pages.question.question_add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'question' => 'required'
        ]);

        $question = New Question;
        $question->question = $request->question;
        $question->score = $request->score;
        $question->type = $request->type;
        $question->status = $request->status;
        $question->save();

        for($q = 1; $q <=4; $q++){
            $option = $request->input('option_text_'.$q);
            if($option != ''){
                QuestionOption::create([
                    'question_id' => $question->id,
                    'option_text' => $option,
                    'correct' => $request->input('correct_'.$q) == 'on' ? 1 : 0
                ]);
            }
        }

        return redirect()->route('question.index')
        ->with([
            'message'    =>'Question Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('lms.pages.question.question_view',compact('question'));
    }

    public function edit($id)
    {
        //return abort(404);
        $question = Question::findOrFail($id);
        $questionOptions = $question->options;

        //return response()->json($question);

        return view('lms.pages.question.question_edit',compact('question','questionOptions'));
    }

    public function update(QuestionRequest $request, $id)
    {
        //return abort(404);
        $validate = $request->validate([
            'question' => 'required'
        ]);

        $question = Question::findOrFail($id);
        $question->question = $request->question;
        $question->score = $request->score;
        $question->type = $request->type;
        $question->status = $request->status;
        $question->save();

        //dd($request->input('option_id_1'));

        for($q = 1; $q <=4; $q++){
            $option = $request->input('option_text_'.$q);
            if($option != ''){
                $qo = QuestionOption::findOrFail($request->input('option_id_'.$q));
                $qo->option_text = $option;
                $qo->correct = $request->input('correct_'.$q) == 'on' ? 1 : 0;
                $qo->save();
            }
        }

        return redirect()->route('question.index')
        ->with([
            'message'    =>'Question Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Question::destroy($id);

        return response()->json(null, 204);
    }
}
