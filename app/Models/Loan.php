<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'amount',
        'months',
        'total_amount',
        'monthly_payment',
        'start_date'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function paymentSchedules()
    {
        return $this->hasMany(PaymentSchedule::class);
    }



    ///عملت  refactor للكود يلي بال  LoanController
    public function createMonthlySchedule()
{
    $monthly = $this->monthly_payment;

    for ($i = 1; $i <= $this->months; $i++) {
        $this->paymentSchedules()->create([
            'month_number' => $i,
            'payment_amount' => $monthly
        ]);
    }
}


    // protected static function booted()
    // {
    //     static::creating(function ($loan) {
    //         $loan->total_amount = $loan->amount * 1.20; // إضافة 20%
    //         $loan->monthly_payment = $loan->total_amount / $loan->months;
    //     });
    // }
}