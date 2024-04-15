<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emails;

class EmailsController extends Controller
{
    public function index(Request $request)
    {
        
        $emails = Emails::all();
            
        return view('EmailsIndex', compact('emails'));
        
    }

    public function create()
    {
        $email = Emails::all(); // Obtener todos las areas

        return view('EmailsCreate', compact('email'));
    }

    public function store(Request $request)
    {
        try {
            $messages = [
                'info.required' => 'El nombre es obligatorio.',
                'info.max' => 'El nombre no debe tener más de :max caracteres.',
                
            ];
            $this->validate($request, [
                'info' => 'required|string|max:255',
                
            ], $messages);
            // Crear un nuevo paciente
            $email = new Emails();
            $email->info = $request->input('info');
            $email->email = $request->input('email');
            $email->phone = $request->input('phone');
            
           
           
            $email->save();
    
            return redirect("/emails")->with('success', 'Tipo de vehiculo creado con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/emails/create")->with('error', 'No se puede agregar el tipo de vehiculo.');
        }
    }

   /* public function show($id)
    {
        $area = Areas::find($id);

        if ($area) {
            return view('AreaShow', compact('area'));
        } else {
            return redirect()->route('areas.index')->with('error', 'area no encontrada.');
        }
    }*/

    public function edit($id)
    {
        // Aquí debes buscar el area por su ID, suponiendo que tienes un modelo llamado "area"
        $email = Emails::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el area encontrado
        return view('EmailsEdit', compact('email'));
    }

    public function update(Request $request, $id)
    {
       // dd($request->all());
                // Validación de datos
                $this->validate($request, [
                    'info' => 'required|string|max:255',
                    
                ]);
        
                // Obtener el area a actualizar
                $email = emails::find($id);
        
                if (!$email) {
                    // Manejar el caso en que el area no se encuentra
                    return redirect()->route('emails.index')->with('error', 'Correo no encontrada');
                }
        
                // Actualizar los datos del area
                $email->info = $request->input('info');
                $email->email = $request->input('email');
                $email->phone = $request->input('phone');
                
        
                $email->save();
        
                return redirect()->route('emails.index', $email->id)->with('success', 'Correo actualizado con éxito');
    }

    public function destroy($id)
    {
        $email = emails::find($id);

        if ($email) {
            $email->refresh();
           
            try {
                $email->delete();
                return redirect("/emails")->with('success', 'Eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/emails")->with('error', 'No se puede eliminar.');
            }
        } else {
            return redirect("/emails")->with('error', 'no encontrado');
        }
    }

}
