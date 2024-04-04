<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class client extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['first_name','last_name','email','birth_date','gender','phone_number','address_line1','address_line2','city','region','zip_code','country','reference_id','security_number','employment','loan_amount_offered','annual_gross_income','reason_for_loan','rent_homeowner','password','nationality','residence_country','company','monthly_salary','office_address','office_phone_number','loan_looking_for','loan_amount_required','property_price','down_payment','years','interest_rate','emirates','lead_type','lead_id',"staff_id"];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public function client()
    {
        return $this->belongsTo(client::class, 'client_id', 'id');
    }

    public function staff()
    {
        return $this->belongsTo(staff::class, 'staff_id', 'id');
    }

    public function clientdocuments() {
        return $this->hasMany(ClientDocument::class);
    }

    
    public function documents()
    {
        return $this->belongsTo(ClientDocument::class, 'client_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($client) {
            // Check if a corresponding user exists
            $user = User::where('email', $client->email)->first();
            if (!$user) {
                // If user doesn't exist, create a new one
                $user = User::create([
                    'fname' => $client->first_name,
                    'lname' => $client->last_name,
                    'email' => $client->email,
                    'password' => $client->password,
                    'role' => 'user',
                ]);
            } else {
                // If user exists, update its details
                $user->update([
                    'fname' => $client->first_name,
                    'lname' => $client->last_name,
                    'password' => $client->password,
                ]);
            }

            // Associate the user with the lead
            $client->user()->associate($user);
        });

          // Handle deleting event
          static::deleting(function ($client) {
            // Find and delete the associated user
            $user = User::where('email', $client->email)->first();
            if ($user) {
                $user->delete();
            }
        });
    }

    protected $casts = [
        'created_at' => 'datetime', // Ensure created_at is cast to a DateTime object
    ];

    public function clients()
{
    return $this->belongsToMany(client::class, 'outbox_message_cliens');
}

}
