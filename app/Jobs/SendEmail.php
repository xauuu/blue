<?php

namespace App\Jobs;

use App\Mail\SendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $details;
    public $rev;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details, $rev)
    {
        $this->details = $details;
        $this->rev = $rev;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         Mail::to($this->rev)->send(new SendMail($this->details));
    }
}
