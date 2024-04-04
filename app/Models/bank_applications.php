<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank_applications extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'bank_id','staff_id', 'plan', 'interest_rate', 'available_date',
        'application_number', 'applicant_name', 'applicant_mobile', 'email',
        'address', 'city', 'residence_country', 'nationality', 'property',
        'staff_name', 'document_id', 'bank_applied', 'bank_branch',
        'bank_product', 'tenure', 'upfront_down_payment', 'monthly_instalment',
        'application_date', 'application_status', 'bank_feedback','loan_number','client_id','client_proposal_plan_id',
    ];



    public function bank()
    {
        return $this->belongsTo(bank::class, 'bank_id', 'id');
    }
    


    public function product()
    {
        return $this->belongsTo(bank_product::class, 'product_id', 'id');
    }

    public function client_proposal()
    {
        return $this->belongsTo(Client_proposal_plan::class, 'client_proposal_plan_id','id');
    }

    public function mortgageplan()
    {
        return $this->belongsTo(Mortgageplan::class, 'plan_id','id');
    }
    
    public function client()
    {
        return $this->belongsTo(client::class, 'client_id', 'id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, '_id', 'id');
    }
    
    public function staff()
    {
        return $this->belongsTo(staff::class, 'staff_id', 'id');
    }
}
