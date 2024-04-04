<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\staff;


class slot extends Model
{
    use HasFactory;

    protected $fillable=['staff_id','date','time_slot','status'];

    public function staff()
    {
        return $this->belongsTo(staff::class, 'staff_id', 'id');
    }

}
