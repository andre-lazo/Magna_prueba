<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Residencia;

class FormularioContacto extends Mailable
{
    use Queueable, SerializesModels;

    public $asunto="CREDENCIALES DE USUARIO";
    public $mensaje;
    public $usuario;
    public function __construct($mensaje,$usuario)
    {
        $this->mensaje=$mensaje;
        $this->usuario=$usuario;
    }

   
    public function build()
    {
        $residencia=Residencia::all();
        
    
        return $this->view('users.email',['correo'=>$this->mensaje]);
    }
}
