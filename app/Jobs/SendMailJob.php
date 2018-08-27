<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendMail;
use Illuminate\Mail\Mailer;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $view;
    protected $datas;
    protected $toUsers;
    protected $toCC;
    protected $toBCC;
    
    /**
     * Create a new job instance.
     *
     * @param [type] $view    view
     * @param [type] $toUsers toUsers
     * @param array  $datas   datas
     * @param array  $toCC    toCC
     * @param array  $toBCC   toBCC
     */
    public function __construct($view, $toUsers, $datas = [], $toCC = [], $toBCC = [])
    {
        $this->toUsers = $toUsers;
        $this->toCC = $toCC;
        $this->toBCC = $toBCC;
        $this->view = $view;
        $this->datas = $datas;
    }

    /**
     * Execute the job.
     *
     * @param mailer $mailer mailer
     *
     * @return void
     */
    public function handle(mailer $mailer)
    {
        $mailer->to($this->toUsers)
            ->cc($this->toCC)
            ->bcc($this->toBCC)
            ->send(new SendMail($this->view, $this->datas));
    }
}
