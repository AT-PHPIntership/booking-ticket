<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datas;
    public $view;

    /**
     * Send mail with option view and data
     *
     * @param [type] $view  view
     * @param array  $datas datas
     */
    public function __construct($view, $datas = [])
    {
        $this->view = $view;
        $this->datas = $datas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->view)
            ->with($this->datas);
    }
}
