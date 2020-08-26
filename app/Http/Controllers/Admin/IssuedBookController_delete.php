<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\IssuedBook;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\IssuedBookRequest;

class IssuedBookController extends Controller
{
    public function index(Request $request)
    {
        //dd(IssuedBook::orderby('created_at','desc')->get());
        if ($request->ajax()) {
            $issuedbooks = IssuedBook::orderby('created_at','desc')->get();
            return Datatables::of($issuedbooks)
            ->addColumn('status',function(IssuedBook $issuedbooks){
                if($issuedbooks->returned >= 1){
                    return '<div class="badge badge-success">Returned </div>';
                }else{
                    return '<div class="badge badge-warning">Pending</div>';
                }
            })
            ->editColumn('issued_on',function(IssuedBook $issuedbooks){
                return Carbon::parse( $issuedbooks->issue_date)->diffForhumans();
            })
            ->editColumn('due_date',function(IssuedBook $issuedbooks){
                //return $issuedbooks->return_date;
                return Carbon::parse( $issuedbooks->due_date )->diffForhumans();
            })
            ->addColumn('book_name',function(IssuedBook $issuedbooks){
                return $issuedbooks->book->title; //$student->user->firstname .','. $student->user->lastname;
            })
            ->addColumn('issued_to',function(IssuedBook $issuedbooks){
                return $issuedbooks->user->firstname . ',' . $issuedbooks->user->lastname; //$student->user->firstname .','. $student->user->lastname;
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<!--a href="'.route('issuedbook.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('issuedbook.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a-->'.
                                    '<a href="'.route('issuedbook.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Return Book</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','status'])
            ->make(true);


        }


        return view('admin.pages.issuedbook.issuedbook');

    }

    public function create()
    {
        $users = User::orderby('created_at','desc')->get();
        $books = Book::orderby('created_at','desc')->where('quantity','>=',1)->get();
        return view('admin.pages.issuedbook.issuedbook_add',compact('users','books'));
    }

    public function store(Request $request)
    {
        //return $request->all();
        $validate = $request->validate([
            'user_id' => 'required',
            'books' => 'required',
            'due_date' => 'required'
        ]);



        foreach($request->books as $book){

            //dd($book);
            $book = Book::findOrFail($book);
            if($book->quantity >= 1){
                $book->quantity-=1;
                $book->save();
            }
            $issuedbook = new IssuedBook;
            $issuedbook->user_id = $request->user_id;
            $issuedbook->book_id = $book->id;
            $issuedbook->quantity = 1;
            $issuedbook->issue_date = Carbon::now();
            $issuedbook->due_date = $request->due_date;
            $issuedbook->save();
        }

        return redirect()
        ->route('issuedbook.index')
        ->with([
            'message'    =>'Book Issued Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $issuedbook = IssuedBook::findOrFail($id);

        return response()->json($issuedbook);
    }

    public function edit($id)
    {
        $issuedbook = IssuedBook::findOrFail($id);

        //return response()->json($issuedbook);

        return view('admin.pages.issuedbook.issuedbook_edit',compact('issuedbook'));
    }

    public function update(IssuedBookRequest $request, $id)
    {

        $issuedbook = IssuedBook::findOrFail($id);

        $book = Book::findOrFail($issuedbook->book_id);
        $book->quantity+=1;
        $book->save();

        $issuedbook->returned = true;
        $issuedbook->return_date = Carbon::now();
        $issuedbook->save();

        return redirect()->route('issuedbook.index')
        ->with([
            'message'    =>'Book Returned Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        IssuedBook::destroy($id);

        return response()->json(null, 204);
    }
}
