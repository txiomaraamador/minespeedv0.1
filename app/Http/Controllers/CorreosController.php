<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emails;
use App\Mail\CorreosMailable;
use Illuminate\Support\Facades\Mail;

class CorreosController extends Controller
{
    public function getMail()
    {
        // Obtener todos los correos de la base de datos
        $emails = Emails::pluck('email')->toArray();

        // Verificar que hay al menos una dirección de correo
        if (!empty($emails)) {
            // Enviar el correo a cada dirección de correo electrónico
            foreach ($emails as $email) {
                Mail::to($email)->send(new CorreosMailable);
            }
            return redirect("/home")->with('success', 'Se enviaron los correos correctamente');
        } else {
            return redirect("/home")->with('error', 'No hay direcciones de correo electrónico en la base de datos');
        }
    }
}
