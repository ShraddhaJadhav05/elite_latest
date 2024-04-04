<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDocument extends Model
{
    use HasFactory;
    protected $fillable=['client_id','document_name','filename','encrypted_file_path','file_path','shown_to_agent','document_type','staff_id'];

    public function client()
    {
        return $this->belongsTo(client::class, 'client_id', 'id');
    }

   
}
