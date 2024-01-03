<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Log;


class SchoolDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_name','image',
        'email',
        'password',
        'mobile_number',
        'country',
        'state',
        'address',
        'pin_code',
        'city',
        'school_zone',
        'faculity_name',
        'faculity_email',
        'faculity_mobileno',
        'faculity_gender',
        'school_doc_image',
        'designation',

    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function completeSchoolProfile(array $addschool ,$uuid ,$imagePath)
    {

        $schoolupdated = $this->where('uuid', $uuid)->update([
            "school_name"        => $addschool['school_name'],
            'image'          => $imagePath,
            "email"              => $addschool['email'],
            "password"           => $addschool['password'],
            "mobile_number"      => $addschool['mobile_number'],
            "country"            => $addschool['country'],
            "state"              => $addschool['state'],
            "city"              => $addschool['city'],
            "address"              => $addschool['address'],
            "pin_code"           => $addschool['pin_code'],
            "school_zone"               => $addschool['school_zone'],

        ]);
    }
    public function completeSchoolFaculityDetail(array $schoolfaculitydetail,$uuid)
    {
      try {
        $schoolFaculityUpdated = $this->where('uuid', $uuid)->update([
          "faculity_name"      => $schoolfaculitydetail['faculity_name'],
          "faculity_email"   => $schoolfaculitydetail['faculity_email'],
          "faculity_mobileno"   => $schoolfaculitydetail['faculity_mobileno'],
          "faculity_gender"   => $schoolfaculitydetail['faculity_gender'],
          "designation"           => $schoolfaculitydetail['designation'],
        ]);
      } catch (\Throwable $e) {
        Log::error('[SchoolDetail][completeSchoolFaculityDetail] Error creating book detail: ' . $e->getMessage());
      }
    }
    public function completeSchoolDocument(array $schooldocument,$uuid)
    {
      try {
        $schoolDocumentUpdated = $this->where('uuid', $uuid)->update([
          "school_doc_image"      => $schooldocument['school_doc_image'],
          
        ]);
      } catch (\Throwable $e) {
        Log::error('[SchoolDetail][completeSchoolDocument] Error creating book detail: ' . $e->getMessage());
      }
    }

    public function addschoolforadmin(array $addschoolforadmin )
    {
        try {
            return $this->create([
                'uuid'           => Uuid::uuid4()->toString(),
                'school_name'      => $addschoolforadmin['school_name'],
                'email'         => $addschoolforadmin['email'],
                'mobile_number'          => $addschoolforadmin['mobile_number'],
                'password'          => $addschoolforadmin['password'],
                'country'    =>$addschoolforadmin['country'],
                'state'    =>$addschoolforadmin['state'],
                'city'    =>$addschoolforadmin['city'],
                'address'    =>$addschoolforadmin['address'],
                'pin_code'    =>$addschoolforadmin['pin_code'],
                'school_zone'    =>$addschoolforadmin['school_zone'],
            ]);
        } catch (\Throwable $e) {
            Log::error('[SchoolDetail][addschoolforadmin] Error creating book detail: ' . $e->getMessage());
        }
    }
  }