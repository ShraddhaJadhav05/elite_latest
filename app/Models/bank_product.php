<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class bank_product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['name','bank_id','plan','interest_rate','available_date','branch_id','tenure','processing_fee','monthly_installment'];

    public function bank()
    {
        return $this->belongsTo(bank::class, 'bank_id', 'id');
    }

    
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    
}
