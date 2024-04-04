<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mortgageplan extends Model
{
    use HasFactory;
    protected $fillable=['mortgage_plan_id','plan_name','branch_id','bank_id','product_id'];

    public function bank()
    {
        return $this->belongsTo(bank::class, 'bank_id')->withTrashed();
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id')->withTrashed();
    }

    public function product()
    {
        return $this->belongsTo(bank_product::class, 'product_id')->withTrashed();
    }
}
