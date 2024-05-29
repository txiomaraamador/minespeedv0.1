<?php

$dbconn = pg_connect("host=127.0.0.1 dbname=minespeedv01 user=postgres password=root");
pg_query($dbconn, "LISTEN report_insert");

while (true) {
    $notification = pg_get_notify($dbconn, PGSQL_ASSOC);
    if ($notification !== false) {
        // Aquí puedes ejecutar la lógica correspondiente, como llamar a la ruta 'correos'
        // Por ejemplo:
        file_get_contents('http://127.0.0.1:8000/correos');
    }
    // Esperar un segundo antes de verificar nuevas notificaciones

}
?>
