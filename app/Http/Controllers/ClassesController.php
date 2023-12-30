<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{

    private $class;

    public function __construct(Classes $class)
    {
        $this->class = $class;
    }
    public function addClassforadmin(Request $request)
    {
        $data = $request->all();
        $this->class->create([
            'class'  => $data['class'],
        ]);
        return redirect('/admin/class');
    }
    public function listClassforadmin()
    {

        $status = null;
        $message = null;
        $classes = $this->class->all();

        return view('admin.add-class', compact('status', 'message', 'classes'))->render();
    }
  
}
