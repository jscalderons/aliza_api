<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PetShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $pet;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Pet $pet)
    {
        $this->pet = $pet;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.pets.new')
                    ->subject('Nueva Mascota');
    }
}
