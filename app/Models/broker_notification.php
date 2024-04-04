<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class broker_notification extends Model
{
    use HasFactory;
    protected $fillable=['broker_id','broker_notification'];

    public function broker()
    {
        return $this->belongsTo(broker::class, 'broker_id', 'id');
    }
}
