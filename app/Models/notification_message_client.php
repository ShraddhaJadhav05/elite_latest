<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification_message_client extends Model
{
    use HasFactory;

    protected $fillable=['notification_message_id','client_id'];


    public function clients()
    {
        return $this->belongsToMany(client::class, 'notification_message_clients');
    }
}
