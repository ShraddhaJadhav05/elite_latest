<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_notification extends Model
{
    use HasFactory;

    protected $fillable=['client_id','client_notification'];

    public function client()
    {
        return $this->belongsTo(client::class, 'client_id', 'id');
    }

}
