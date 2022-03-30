<?php

namespace App\Jobs;

use App\Mail\SendRervationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReservasiMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $email;
    private $uuid;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($resev)
    {
        $this->email = $resev->email_pemesan;
        $this->uuid = $resev->uuid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new SendRervationMail(route('detailresevarsi',$this->uuid)));
    }
}
