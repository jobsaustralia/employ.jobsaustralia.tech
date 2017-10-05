<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Engage extends Mailable{
    use Queueable, SerializesModels;

    protected $link;
    protected $employername;
    protected $jobtitle;
    protected $email;

    public function __construct($link, $employername, $jobtitle, $email){
        $this->link = $link;
        $this->employername = $employername;
        $this->jobtitle = $jobtitle;
        $this->email = $email;
    }

    public function build(){
        $this->replyTo($this->email);
        $this->subject($this->employername . " wants to discuss your job application");
        return $this->view('emails.engage')->with(['link' => $this->link, 'employername' => $this->employername, 'jobtitle' => $this->jobtitle]);
    }
}
