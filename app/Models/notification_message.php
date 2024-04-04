<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification_message extends Model
{
    use HasFactory;

    protected $fillable=['staff_id','client_id','message','attached_file'];
  
    public function clients()
    {
        return $this->belongsToMany(client::class, 'notification_message_clients');
    }
}
