<?php

namespace App\Http\Controllers;

use App\Models\BookDetail;
use App\Models\BookSchool;
use App\Models\Classes;
use App\Models\SchoolDetail;
use App\Traits\SessionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookDetailController extends Controller
{
    use SessionTrait;

    private $bookdetails, $classes, $bookSchool, $schoolDetails;
    public function __construct(
        BookDetail $bookdetail,
        Classes $class,
        BookSchool $bookSchool,
        SchoolDetail $schoolDetails,
    ) {
        $this->bookdetails = $bookdetail;
        $this->classes = $class;
        $this->bookSchool = $bookSchool;
        $this->schoolDetails = $schoolDetails;
    }

    public function addbookDetails(Request $request)
    {

        try {
            $this->validate($request, [
                'image'        => 'required',
                'book_name'    => 'required',
                'status'       => 'required',
                'stock_status' => 'required',
                'price'        => 'required',
                'class_id'     => 'required',
                'description'  => 'required',
                'part'         => 'required',
                'publisher'    => 'required',
                'quantity'     => 'required',
                'image.*'      => 'image|mimes:jpeg,png,jpg,svg',
            ]);

            $imagefile = $request->file('image');
            $filename = time() . '_' . $imagefile->getClientOriginalName();
            $imagePath = 'BookImage/' . $filename;
            $imagefile->move(public_path('BookImage/'), $filename);

            $this->bookdetails->AddBookDetail($request->all(), $imagePath);
            return back()->with('status', 'success')->with('message', 'Book Added Succesfully');
        } catch (\Exception $e) {
            Log::error('[BookDetailController][addbookDetails]Validation error: ' . 'Request=' . $request);
            return back()->with('status', 'error')->with('message', 'Book Not Added ');
        }
    }

    public function viewBook(Request $request)
    {
        $status = null;
        $message = null;
        $bookdetails = $this->bookdetails->all();
        $classes = $this->classes->all();
        return view('admin.add-new-book', compact('status', 'message', 'bookdetails', 'classes'));
    }

    public function viewBookDetails(string $uuid)
    {
        $status = null;
        $message = null;
        $bookdetails = $this->bookdetails->where('uuid', $uuid)->first();
        return view('school.view-book-detail', compact('bookdetails', 'status', 'message'));
    }
    public function fetchpurchaselist(Request $request)
    {
        $status = null;
        $message = null;
        $bookdetails = $this->bookdetails->all();
        return view('school.my-purchase-list', compact('bookdetails'))->render();
    }
    public function listbookforadmin()
    {
        $status = null;
        $message = null;
        $bookdetails = $this->bookdetails->with('class')->get();
        return view('admin.list-book', compact('bookdetails'))->render();
    }

    public function fetchBookDetail(Request $request)
    {
        $status = null;
        $message = null;
        $adminSession = $this->getSchoolSession($request);
        $uuid = $adminSession['uuid'];
        $school = $this->schoolDetails->where('uuid', $uuid)->first();
        
        $bookdetails = $this->bookSchool
            ->where('school_id', $school->id)
            ->with('book.class') // Include the necessary relationships
            ->get();
    
        // dd($bookdetails);
        return view('school.place-neworder', compact('bookdetails'))->render();
    }
    
}
