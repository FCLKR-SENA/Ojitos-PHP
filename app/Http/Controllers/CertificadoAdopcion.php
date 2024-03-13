<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificadoAdopcion extends  Mailable
{
    use Queueable, SerializesModels;

    public $adoption;
    public $pdfPath;

    public function __construct(Adoption $adoption, $pdfPath)
    {
        $this->adoption = $adoption;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->subject('Certificado de Adopción')
            ->view('emails.agradecimiento-adoption')
            ->attach($this->pdfPath, [
                'as' => 'certificado_adopcion.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
