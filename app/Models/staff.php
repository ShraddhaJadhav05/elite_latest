<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;


class staff extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['first_name','last_name','email','birth_date','gender','phone_number','address_line1','address_line2','city','region','zip_code','country','department','password','role_id','nationality'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function staff()
    {
        return $this->belongsTo(staff::class, 'staff_id', 'id');
    }

    // protected static function boot()
    // {
    //     parent::boot();

        
        //     static::creating(function ($staff) {
            //         $user = User::create([
                //             'fname' => $staff->first_name,
                //             'lname' => $staff->last_name,
                //             'email' => $staff->email,
                //             'password' => $staff->password, 
                //             'role' => 'staff',
            //         ]);

            //         // Associate the staff member with the user
            //         $staff->user()->associate($user);
        //     });
    // }
}
