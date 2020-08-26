<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Profile;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        //$teachers = Teacher::orderby('created_at','desc')->with('sections')->get();
        //dd($teachers);
        if ($request->ajax()) {
            $teachers = Teacher::orderby('created_at','desc')->latest('id');

            return Datatables::of($teachers)
            ->editColumn('created_at',function(Teacher $teacher){
                return $teacher->created_at->diffForHumans();
            })
            ->addColumn('name',function(Teacher $teacher){
                return $teacher->user->firstname .','. $teacher->user->lastname;
            })
            ->addColumn('sections',function(Teacher $teacher){
                $sections = $teacher->sections;
                $sec = '';
                if($sections){
                    foreach($sections as $section){
                       $sec = $sec. '<div class="badge badge-info mr-1" >'. $section->name .'</div>';
                    };
                }
                return $sec;
            })
            ->addColumn('courses',function(Teacher $teacher){
                $sections = $teacher->sections;
                $sec = '';
                if($sections){
                    foreach($sections as $section){
                        foreach($section->courses as $course){
                            $sec = $sec. '<div class="badge badge-info mr-1" >'. $course->name .'</div>';
                        }
                    };
                }
                return $sec;
            })
            ->addColumn('status',function(Teacher $teacher){
                if($teacher->status == true){
                    return '<div class="badge badge-success">Active</div>';
                }else{
                    return '<div class="badge badge-warning">InActive</div>';
                }
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('teacher.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('teacher.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','status','sections','courses'])
            ->make(true);


        }


        return view('admin.pages.teacher.teacher');

    }

    public function create()
    {
        return view('admin.pages.teacher.teacher_add');
    }

    public function store(TeacherRequest $request)
    {
        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required',
        ]);

        $user = New User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->type = 'teacher';
        $user->password = bcrypt('password');
        $user->save();

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->save();

        $student = new Teacher;
        $student->user_id = $user->id;
        $student->save();

        return redirect()->route('teacher.index')
        ->with([
            'message'    =>'Teacher Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);

        return response()->json($teacher);
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        //return response()->json($teacher);

        return view('admin.pages.teacher.teacher_edit',compact('teacher'));
    }

    public function update(TeacherRequest $request, $id)
    {

        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required',
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->save();

        $user = User::findOrFail($teacher->user_id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();

        return redirect()->route('teacher.index')
        ->with([
            'message'    =>'Teacher Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        User::destroy($teacher->user_id);
        return response()->json(null, 204);
    }
}
