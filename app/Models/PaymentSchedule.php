<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PaymentSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'month_number',
        'payment_amount',
    ];

    // العلاقة مع القرض (كل دفعة belongTo قرض واحد)
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

}