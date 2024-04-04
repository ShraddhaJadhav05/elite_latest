<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Bankbranch extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['bank_id','branch_id','description','address','city','emirate','country','contact'];

    public function bank()
    {
        return $this->belongsTo(bank::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    
}
