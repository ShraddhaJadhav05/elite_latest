<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outbox_message extends Model
{
    use HasFactory;

    protected $fillable=['staff_id','client_id','subject','message','attached_file','reply_flag','replyMessage','archive_status','starred_status'];

    public function clients()
    {
        return $this->belongsToMany(client::class, 'outbox_message_cliens');
    }

    
}
