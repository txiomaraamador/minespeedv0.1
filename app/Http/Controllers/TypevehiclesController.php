<?php

namespace App\Http\Controllers;
use App\Models\Typevehicles;

use Illuminate\Http\Request;

class TypevehiclesController extends Controller
{
    public function index(Request $request)
    {
        
        $typevehicles = Typevehicles::all();
            
        return view('TypevehiclesIndex', compact('typevehicles'));
        
    }

    public function create()
    {
        $typevehicle = Typevehicles::all(); // Obtener todos las areas

        return view('TypevehiclesCreate', compact('typevehicle'));
    }

    public function store(Request $request)
    {
        try {
            $messages = [
                'name.required' => 'El nombre es obligatorio.',
                'name.max' => 'El nombre no debe tener más de :max caracteres.',
                
            ];
            $this->validate($request, [
                'name' => 'required|string|max:255',
                
            ], $messages);
            // Crear un nuevo paciente
            $typevehicle = new Typevehicles();
            $typevehicle->name = $request->input('name');
           
           
            $typevehicle->save();
    
            return redirect("/typevehicles")->with('success', 'Tipo de vehiculo creado con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/typevehicles/create")->with('error', 'No se puede agregar el tipo de vehiculo.');
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
        $typevehicle = Typevehicles::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el area encontrado
        return view('TypevehiclesEdit', compact('typevehicle'));
    }

    public function update(Request $request, $id)
    {
       // dd($request->all());
                // Validación de datos
                $this->validate($request, [
                    'name' => 'required|string|max:255',
                    
                ]);
        
                // Obtener el area a actualizar
                $typevehicle = Typevehicles::find($id);
        
                if (!$typevehicle) {
                    // Manejar el caso en que el area no se encuentra
                    return redirect()->route('typevehicles.index')->with('error', 'Tipo de vehiculos no encontrada');
                }
        
                // Actualizar los datos del area
                $typevehicle->name = $request->input('name');
                
        
                $typevehicle->save();
        
                return redirect()->route('typevehicles.index', $typevehicle->id)->with('success', 'Tipo de vehiculo actualizado con éxito');
    }

    public function destroy($id)
    {
        $typevehicle = Typevehicles::find($id);

        if ($typevehicle) {
            $typevehicle->refresh();
           
            try {
                $typevehicle->delete();
                return redirect("/typevehicles")->with('success', 'El tipo de vehiculo ha sido eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/typevehicles")->with('error', 'No se puede eliminar el tipo de vehiculo está siendo utilizado en otra parte del sistema.');
            }
        } else {
            return redirect("/typevehicles")->with('error', 'tipo de vehiculo no encontrado');
        }
    }
}
