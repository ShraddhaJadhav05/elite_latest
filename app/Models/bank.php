<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class bank extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['name','logo','description','branch_name','address','city','emirate','country','contact'];

    public function bank()
    {
        return $this->belongsTo(bank::class, 'bank_id', 'id');
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'bankbranches', 'bank_id', 'branch_id');
    }

}
