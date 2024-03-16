<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Factura;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FacturaVacuna extends Mailable
{

    use Queueable, SerializesModels;

    public $factura;
    public $pdfPath;
    public $adop;

    public function __construct(Factura $factura, Adoption $adop,$pdfPath)
    {
        $this->factura = $factura;
        $this->adop = $adop;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->subject('Factura de compra')
            ->view('emails.factura-vacuna')
            ->attach($this->pdfPath, [
                'as' => 'facturaAdjunta-vacuna.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
