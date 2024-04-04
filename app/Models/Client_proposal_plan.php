<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_proposal_plan extends Model
{
    use HasFactory;
    protected $fillable=['client_id','plan_id'];

    public function mortgageplan()
    {
        return $this->belongsTo(Mortgageplan::class, 'plan_id');
    }
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
