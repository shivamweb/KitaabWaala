<?php

namespace App\Traits;

use App\Models\AdminDetail;
use App\Models\SchoolDetail;
use Illuminate\Support\Facades\Session;

trait SessionTrait
{
  
    public function storeAdminSession(AdminDetail $adminDetails)
    {
        // Set cookies for user data
        session(['uuid' => $adminDetails->uuid]);
    }
    public function getAdminSession()
    {
        $uuid = Session::get('uuid');
        return ['uuid' => $uuid];
    }
    public function storeSchoolSession(SchoolDetail $schooldetail)
    {
        session(['uuid' => $schooldetail->uuid]);
    }

    public function getSchoolSession()
    {
        $uuid = Session::get('uuid');
       
        return [
            'uuid' => $uuid,
           
        ];
    }
  
}
