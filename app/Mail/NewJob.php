<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewJob extends Mailable{
    use Queueable, SerializesModels;

    protected $link;
    protected $title;
    protected $description;

    public function __construct($link, $title, $description){
        $this->link = $link;
        $this->title = $title;
        $this->description = $description;
    }

    public function build(){
        $this->subject("We found a new job that might interest you");
        return $this->view('emails.newjob')->with(['link' => $this->link, 'title' => $this->title, 'description' => $this->description]);
    }
}
