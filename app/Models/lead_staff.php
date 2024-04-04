<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class lead_staff extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['lead_id','staff_id','application_priority'];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public function staff()
    {
        return $this->belongsTo(staff::class, 'staff_id');
    }
}
