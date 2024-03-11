<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InformacionAdopcionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $adoption;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Adoption $adoption)
    {
        $this->adoption = $adoption;
    }

    /**
     * Build the message.
     *
     * @return $this
     */


    public function build()
    {
        if($this->adoption->adoption_status!='En proceso' ){
            return $this->view('emails.cancelacion-adoption')
                ->subject('Proceso de solicitud - Cancelada ' ); // Asunto del correo
        }else{
            return $this->view('emails.rechazo-adoption')
                ->subject('Solicitud Rechazada');
        }
    }
}
