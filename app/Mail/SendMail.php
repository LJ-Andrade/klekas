<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $data; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $view, $data)
    {
        $this->data = $data;
        $this->subject = $subject;
        $this->view    = $view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('vadmin.components.mail'.$this->view)
            ->with(['data' => $this->data]);
    }
}
