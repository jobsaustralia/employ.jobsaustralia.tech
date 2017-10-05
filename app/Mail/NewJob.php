<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable{
    use Queueable, SerializesModels;

    protected $id;
    protected $title;
    protected $description;

    public function __construct($id, $title, $description){
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }

    public function build(){
        return $this->view('emails.newjob')->with(['id' => $id, 'title' => $this->title, 'description' => $this->description]);
    }
}
