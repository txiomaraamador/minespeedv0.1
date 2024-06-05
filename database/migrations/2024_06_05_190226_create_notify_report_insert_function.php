<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       // Crear la función PL/pgSQL
       DB::unprepared('
       CREATE OR REPLACE FUNCTION public.notify_report_insert()
           RETURNS trigger
           LANGUAGE \'plpgsql\'
           COST 100
           VOLATILE NOT LEAKPROOF
       AS $BODY$
       BEGIN
           PERFORM pg_notify(\'report_insert\', \'\');
           RETURN NEW;
       END;
       $BODY$;
   ');

   // Crear el trigger que llama a la función
   DB::unprepared('
       CREATE TRIGGER trigger_report_insert
       AFTER INSERT ON reports
       FOR EACH ROW
       EXECUTE FUNCTION public.notify_report_insert();
   ');

   // Cambiar el propietario de la función a postgres
   DB::unprepared('
       ALTER FUNCTION public.notify_report_insert()
           OWNER TO postgres;
   ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         // Eliminar el trigger
         DB::unprepared('DROP TRIGGER IF EXISTS trigger_report_insert ON your_table_name;');

         // Eliminar la función
         DB::unprepared('DROP FUNCTION IF EXISTS public.notify_report_insert();');
    }
};
