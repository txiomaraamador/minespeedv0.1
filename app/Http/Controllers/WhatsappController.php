<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Chat\V2\Service\Channel\MessageInstance;

class WhatsappController extends Controller
{
    public function enviarMensajeWhatsApp(Request $request)
    {
        try {
            // Tu cuenta de Twilio
            $accountSid = env('TWILIO_ACCOUNT_SID');
            $authToken = env('TWILIO_AUTH_TOKEN');
            $twilioNumber = env('TWILIO_PHONE_NUMBER');            
            
            // Crear un cliente de Twilio
            $twilio = new Client($accountSid, $authToken);

            // Número de teléfono al que deseas enviar el mensaje de WhatsApp
            $destinatario = "whatsapp:+524331131492"; // Reemplaza con el número de destino

            // Mensaje que deseas enviar
            $mensaje = "Mensaje de ALERTA de prueba";

            // Enviar el mensaje de WhatsApp
            $twilio->messages->create(
                $destinatario,
                [
                    "from" => "whatsapp:".$twilioNumber,
                    "body" => $mensaje
                ]
            );

            return response()->json(['success' => true, 'message' => 'Mensaje de WhatsApp enviado.']);

        } catch (TwilioException $ex) {
            // Manejar errores de Twilio
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        } catch (\Exception $ex) {
            // Otros errores
            return response()->json(['success' => false, 'message' => $ex->getMessage()]);
        }
    }
}
