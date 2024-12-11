<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyKYC extends Model
{
    use HasFactory;

    protected $table = 'mykycs';

    protected $fillable= [
        'fname',
        'mname',
        'lname',
        'address',
        'phone',
        'email',
        'dob',
        'citizenshipimg',
        'licenseimg',
        'licensetype',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
