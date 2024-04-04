<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_staff extends Model
{
    use HasFactory;
    
    protected $fillable=['client_id','staff_id','application_priority'];

    public function client()
    {
        return $this->belongsTo(client::class, 'client_id');
    }

    public function staff()
    {
        return $this->belongsTo(staff::class, 'staff_id');
    }
}
