<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeequipments;

class TypeequipmentsController extends Controller
{
    public function index(Request $request)
    {
        
        $typeequipments = Typeequipments::all();
            
        return view('TypeequipmentsIndex', compact('typeequipments'));
        
    }

    public function create()
    {
        $typeequipment = Typeequipments::all(); // Obtener todos las areas

        return view('TypeequipmentsCreate', compact('typeequipment'));
    }

    public function store(Request $request)
    {
        try {
            $messages = [
                'make.required' => 'El nombre es obligatorio.',
                'make.max' => 'El nombre no debe tener más de :max caracteres.',
                
            ];
            $this->validate($request, [
                'make' => 'required|string|max:255',
                
            ], $messages);
            // Crear un nuevo paciente
            $typeequipment = new Typeequipments();
            $typeequipment->make = $request->input('make');
            $typeequipment->description = $request->input('description');
            $typeequipment->model = $request->input('model');
           
           
            $typeequipment->save();
    
            return redirect("/typeequipments")->with('success', 'Tipo de equipo creado con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/typeequipments/create")->with('error', 'No se puede agregar el tipo de equipo.');
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
        $typeequipment = Typeequipments::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el area encontrado
        return view('TypeequipmentsEdit', compact('typeequipment'));
    }

    public function update(Request $request, $id)
    {
       // dd($request->all());
                // Validación de datos
                $this->validate($request, [
                    'make' => 'required|string|max:255',
                    
                ]);
        
                // Obtener el area a actualizar
                $typeequipment = Typeequipments::find($id);
        
                if (!$typeequipment) {
                    // Manejar el caso en que el area no se encuentra
                    return redirect()->route('typeequipments.index')->with('error', 'Tipo de equipo no encontrada');
                }
        
                // Actualizar los datos del area
                $typeequipment->make = $request->input('make');
                $typeequipment->description = $request->input('description');
                $typeequipment->model = $request->input('model');
                
        
                $typeequipment->save();
        
                return redirect()->route('typeequipments.index', $typeequipment->id)->with('success', 'Tipo de equipo actualizado con éxito');
    }

    public function destroy($id)
    {
        $typeequipment = Typeequipments::find($id);

        if ($typeequipment) {
            $typeequipment->refresh();
           
            try {
                $typeequipment->delete();
                return redirect("/typeequipments")->with('success', 'El tipo de equipo ha sido eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/typeequipments")->with('error', 'No se puede eliminar el tipo de equipo está siendo utilizado en otra parte del sistema.');
            }
        } else {
            return redirect("/typeequipments")->with('error', 'tipo de equipo no encontrado');
        }
    }
}
