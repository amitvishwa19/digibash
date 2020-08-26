<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Profile;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        //$students = Student::with('user','section')->orderby('created_at','desc')->get();
        //dd($students);
        //dd(Student::with('user')->orderby('created_at','desc')->get());
        if ($request->ajax()) {
            $students = Student::with('user','section')->orderby('created_at','desc')->latest('id');

            return Datatables::of($students)
            ->editColumn('created_at',function(Student $student){
                return $student->created_at->diffForHumans();
            })
            ->addColumn('name',function(Student $student){
                return $student->user->firstname .','. $student->user->lastname;
            })
            ->addColumn('section',function(Student $student){
                return $student->section->name;
            })
            ->addColumn('status',function(Student $student){
                if($student->user->status == true){
                    return '<div class="badge badge-success">Active</div>';
                }else{
                    return '<div class="badge badge-warning">InActive</div>';
                }
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('student.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('student.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','status'])
            ->make(true);


        }


        return view('admin.pages.student.student');

    }

    public function create()
    {
        $sections = Section::where('status',true)->get();
        return view('admin.pages.student.student_add',compact('sections'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required',
            'section' => 'required'
        ],[
            'section.required' => 'Please select a Section'
        ]);

        // $student = New Student;
        // $student->name = $request->name;
        // $student->save();
        $user = New User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->type = 'student';
        $user->password = bcrypt('password');
        $user->save();

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->save();

        $student = new Student;
        $student->user_id = $user->id;
        $student->section_id = $request->section;
        $student->save();


        return redirect()->route('student.index')
        ->with([
            'message'    =>'Student Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return response()->json($student);
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $sections = Section::where('status',true)->get();
        //return response()->json($student);

        return view('admin.pages.student.student_edit',compact('student','sections'));
    }

    public function update(StudentRequest $request, $id)
    {

        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required',
            'section' => 'required'
        ],[
            'section.required' => 'Please select a Section'
        ]);

        $student = Student::findOrFail($id);
        $student->section_id = $request->section;
        $student->save();

        $user = User::findOrFail($student->user_id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();

        return redirect()->route('student.index')
        ->with([
            'message'    =>'Student Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        User::destroy($student->user_id);
        return response()->json(null, 204);
    }
}
