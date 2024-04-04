<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outbox_message_cliens extends Model
{
    use HasFactory;

    protected $fillable=['outbox_message_id','client_id'];


    public function clients()
    {
        return $this->belongsToMany(client::class, 'outbox_message_cliens');
    }
}
