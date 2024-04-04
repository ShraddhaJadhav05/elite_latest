<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Branch extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['branch_name'];

    public function banks()
    {
        return $this->belongsToMany(Bank::class, 'bankbranches', 'branch_id', 'bank_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

     public function bankBranches()
    {
        return $this->hasMany(BankBranch::class);
    }
}
