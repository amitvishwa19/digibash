<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use App\Models\Book;
use App\MOdels\IssuedBook;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::orderby('created_at','desc')->latest('id');
            return Datatables::of($books)
            ->addColumn('status',function(Book $book){
                if($book->quantity >= 1){
                    return '<div class="badge badge-success">Avaliable <span class="badge badge-success">'.$book->quantity.'</span></div>';
                }else{
                    return '<div class="badge badge-warning">Not Avaliable</div>';
                }
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<!--a href="'.route('book.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn" disabled="disabled">Issue</a-->'.
                                    '<a href="'.route('book.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','status'])
            ->make(true);


        }

        $books = Book::orderby('created_at','desc')->get();
        return view('admin.pages.book.book',compact('books'));

    }

    public function create()
    {
        return view('admin.pages.book.book_add');
    }

    public function store(BookRequest $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'type' => 'required',
            'quantity' => 'required'
        ]);

        $book = New Book;
        $book->book_code = strtoupper(mb_substr($request->type, 0, 2)) .strtoupper(mb_substr($request->author, 0, 2)) .strtoupper(mb_substr($request->title, 0, 2)) . mt_rand(10000,99999);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->type = $request->type;
        $book->quantity = $request->quantity;
        $book->save();

        return redirect()->route('book.index')
        ->with([
            'message'    =>'Book Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        return response()->json($book);
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        //return response()->json($book);

        return view('admin.pages.book.book_edit',compact('book'));
    }

    public function update(BookRequest $request, $id)
    {

        $validate = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'type' => 'required',
            'quantity' => 'required'
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->type = $request->type;
        $book->quantity = $request->quantity;
        $book->save();

        return redirect()->route('book.index')
        ->with([
            'message'    =>'Book Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Book::destroy($id);

        return response()->json(null, 204);
    }


}
