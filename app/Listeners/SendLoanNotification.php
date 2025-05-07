<?php

namespace App\Listeners;

use App\Events\LoanCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLoanNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(LoanCreated $event)
    {
        $loan->$event->loan;
        Log::info("قرض جديد تم إنشاؤه للمستخدم: " . $loan->customer->name);

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\LoanCreated  $event
     * @return void
     */
    public function handle(LoanCreated $event)
    {
        //
    }
}
