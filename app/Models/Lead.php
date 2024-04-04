<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lead extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['first_name','last_name','email','birth_date','gender','phone_number','address_line1','address_line2','city','region','zip_code','country','reference_id','security_number','employment','loan_amount_offered','annual_gross_income','reason_for_loan','rent_homeowner','password','nationality','residence_country','company','monthly_salary','office_address','office_phone_number','loan_looking_for','loan_amount_required','property_price','down_payment','years','interest_rate','emirates','lead_type','application_status','staff_id'];

    public function leadStaff()
    {
        return $this->hasMany(lead_staff::class, 'lead_id');
    }

    public function client()
    {
        return $this->belongsTo(client::class, 'email', 'email');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function staff()
    {
        return $this->belongsTo(staff::class, 'staff_id', 'id');
    }


    public function lead()
    {
        return $this->belongsTo(Lead::class, 'id');
    }

    // protected static function boot()
    // {
    //     parent::boot();

        //     static::saving(function ($lead) {
            //         // Check if a corresponding user exists
            //         $user = User::where('email', $lead->email)->first();
            //         if (!$user) {
                //             // If user doesn't exist, create a new one
                //             $user = User::create([
                    //                 'fname' => $lead->first_name,
                    //                 'lname' => $lead->last_name,
                    //                 'email' => $lead->email,
                    //                 'password' => $lead->password,
                    //                 'role' => 'user',
                //             ]);
            //         } else {
                //             // If user exists, update its details
                //             $user->update([
                    //                 'fname' => $lead->first_name,
                    //                 'lname' => $lead->last_name,
                    //                 'password' => $lead->password,
                //             ]);
            //         }

            //         // Associate the user with the lead
            //         $lead->user()->associate($user);
        //     });

          //       // Handle deleting event
          //       static::deleting(function ($lead) {
            //         // Find and delete the associated user
            //         $user = User::where('email', $lead->email)->first();
            //         if ($user) {
                //             $user->delete();
            //         }
    //     });
    // }

}
