<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InformacionAnimalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $animal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Animal $animal)
    {
        $this->animal = $animal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->view('emails.informacion-animal')
            ->subject('Información del Animal'); // Asunto del correo
    }


}
