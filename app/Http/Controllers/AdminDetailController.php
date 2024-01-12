<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminDetail;
use Illuminate\Support\Facades\Log;
use App\Traits\SessionTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AdminDetailController extends Controller
{
    use SessionTrait;
    private $adminDetails;

    public function __construct(AdminDetail $adminDetails)
    {
        $this->adminDetails =  $adminDetails;
    }
    public function showAdminLoginForm(Request $request)
    {
        $status = null;
        $message = null;
        return view('admin.admin-login', compact('status', 'message'));
    }
    public function Adminsignin(Request $request)
    {
        try {
            $credentials = $request->all();
            $admin = $this->adminDetails->where([
                'email'    => $credentials['email'],
                'password' => $credentials['password']
            ])->first();

            if (!$admin) {
                session()->flush();
                return redirect('admin/admin-login')->with('status', 'error')->with('message', 'Invalid credential');
            }
            $this->storeAdminSession($admin);
            return redirect('/admin/profile');
        } catch (\Exception $e) {
        
            Log::error('[AdminDetailController][signin] Error Login admin ' . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect('/admin/profile')->with('error', 'An error occurred during login.');
        }
    }
    public function showAdminProfile(Request $request)
    {
        $adminSession = $this->getAdminSession($request);
        $uuid = $adminSession['uuid'];
        $adminDetails = $this->adminDetails->where('uuid', $uuid)->first();
        $status = null;
        $message = null;
        return view('admin.profile', compact('status', 'message', 'adminDetails'));
    }
    public function createAdmin(Request $request)
    {

        try {
            $this->validate($request, [
                'firstname'       => 'required',
                'lastname'        => 'required',
                'email'           => 'required|email|unique:users,email',
                'password'        => 'required|min:8|',

            ]);
            $admin = $this->adminDetails->create([
                'firstname'     => $request->input('firstname'),
                'lastname'      => $request->input('lastname'),
                'email'         => $request->input('email'),
                'password'      => $request->input('password'),
            ]);

            return redirect('admin/admin-login');
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag();
            Log::error('[AdminDetailController][create]Validation error: ' . 'Request=' . $request . ', Errors =' . implode(', ', $errors->all()));
            return redirect('admin/admin-login')->with('status', 'error')->with('message', 'Vendor not registered successfully !')->with('errors', $errors);
        } catch (\Exception $e) {
            Log::error('[AdminDetailController][create] Error creating user: '  . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect('admin/admin-login')->with('status', 'error')->with('message',  'Profile not registered successfully!' . $e->getMessage());
        }
    }
    public function storeAdminProfile(Request $request)
    {
      try {
        $adminSession = $this->getAdminSession($request);
        $uuid = $adminSession['uuid'];
        $this->validate($request, [
          'firstname'     => 'required',
          'lastname'      => 'required',
          'mobile_number' => 'required',
          'image'         => 'required|mimes:jpeg,png,jpg,gif,avif|max:2048',
        ]);
  
        $imagePath = null;
  
        if ($request->hasFile('image')) {
          $adminImage = $request->file('image');
          $filename = time() . '_' . $adminImage->getClientOriginalName();
          $imagePath = 'adminProfile_images/' . $filename;
          $adminImage->move(public_path('adminProfile_images/'), $filename);
        }
        $adminProfileData = $request->all();
        $this->adminDetails->completeAdminProfile($adminProfileData, $imagePath, $uuid);
  
        return redirect()->back()->with('status', 'success')->with('message', 'Admin profile completed');
      } catch (ValidationException $e) {
        $errors = $e->validator->getMessageBag();
        Log::error('[AdminDetailController][storeAdminProfile]Validation error: ' . 'Request=' . $request . ', Errors =' . implode(', ', $errors->all()));
        return redirect()->back()->with('status', 'error')->with('message', 'Profile not comleted successfully !')->with('errors', $errors);
      }
    }
    public function Adminlogout()
  {
      $uuid = Session::get('uuid');
      Session::forget('uuid');

      Session::flash('success', 'You have been logged out.');
      return redirect('admin/admin-login');
  }

}
