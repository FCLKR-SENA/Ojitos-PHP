<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class linkAdopcionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $adoption;
    public $subject;
    public $view;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Adoption $adoption, $url, $subject, $view)
    {   $this->adoption=$adoption;
        $this->url=$url;
        $this->subject = $subject;
        $this->view = $view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->view)
            ->subject($this->subject);
    }


    /*public function build()
    {
        if($this->adoption->adoption_status!='En proceso' ){
            return $this->view('emails.cancelacion-adoption')
                ->subject('Proceso de solicitud - Cancelada ' ); // Asunto del correo
        }else{
            return $this->view('emails.rechazo-adoption')
                ->subject('Solicitud Rechazada');
        }
    }

    public function buildEnvioSolicitud()
    {
        return $this->view('emails.solicitud-adoption')
            ->subject('Solicitud Recibida');

    }*/

}
