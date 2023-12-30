<?php

namespace App\Http\Controllers;

use App\Models\BookDetail;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class BookDetailController extends Controller
{
    private $bookdetails , $classes;
    public function __construct(BookDetail $bookdetail , Classes $class )
    {
        $this->bookdetails = $bookdetail;
        $this->classes = $class;
    }

    public function addbookDetails(Request $request)
    {
        try {
            $this->validate($request, [
                'image'            => 'required',
                'book_name'         => 'required',
                'status'                  => 'required',
                'stock_status'                  => 'required',
                'price'      => 'required',
                'class_id'   => 'required',
                'description' => 'required',
                'image.*'      => 'image|mimes:jpeg,png,jpg,svg|max:2048|dimensions:width=232,height=218',
            ]);
       
            $imagefile = $request->file('image');
            $filename = time() . '_' . $imagefile->getClientOriginalName();
            $imagePath = 'BookImage/' . $filename;
            $imagefile->move(public_path('BookImage/'), $filename);

            $this->bookdetails->AddBookDetail($request->all(), $imagePath);
            return back()->with('status', 'success')->with('message', 'Book Added Succesfully');
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag();
            Log::error('[BookDetailController][addbookDetails]Validation error: ' . 'Request=' . $request . ', Errors =' . implode(', ', $errors->all()));
            return redirect('admin/dashboard')->with('status', 'error')->with('message', 'Profile not comleted successfully !')->with('errors', $errors);
        }
    }

    public function viewBook(Request $request)
    {
        $status = null;
        $message = null;
        $bookdetails = $this->bookdetails->all();
        $classes = $this->classes->all();
        return view('admin.add-new-book', compact('status', 'message','bookdetails','classes'));
    }
    public function fetchBookDetail()
    {
        $status = null;
        $message = null;
        $bookdetails = $this->bookdetails->all();
        return view('school.my-purchase-list', compact('bookdetails'))->render();
    }
    public function viewBookDetails(string $uuid)
    {
        $status = null;
        $message = null;
        $bookdetails = $this->bookdetails->where('uuid', $uuid)->first();
        return view('school.view-book-detail', compact('bookdetails', 'status', 'message'));
    }
    public function placeNewBookOrder()
    {
        $status = null;
        $message = null;
        $bookdetails= $this->bookdetails->all();
        return view('school.place-neworder', compact('bookdetails'))->render();
    }
    public function listbookforadmin()
    {
        $status = null;
        $message = null;
        $bookdetails = $this->bookdetails->all();
        return view('admin.list-book', compact('bookdetails'))->render();
    }
    
}