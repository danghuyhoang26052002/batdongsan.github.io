<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    private $v;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$params=[])
    {
        $this->email = $email;
        $this->v = $params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject("Liên Hệ Yêu Cầu Phản Hồi")

            ->view('admin/user.email',$this->v)
            ->with('emails', $this->email);
    }
}
