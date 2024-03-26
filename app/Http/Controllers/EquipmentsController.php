<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipments;
use App\Models\Typeequipments;
use App\Models\Areas;

class EquipmentsController extends Controller
{
    public function index(Request $request)
    {
        $equipments = Equipments::with('nametypeequipment','namearea')->get();
        return view('EquipmentsIndex', compact('equipments'));
    }

    public function create()
    {
        $typeequipments = Typeequipments::all(); // Obtener todos las areas
        $areas = Areas::all(); // Obtener todos las areas

        return view('EquipmentsCreate', compact('typeequipments', 'areas'));
    }

    public function store(Request $request)
    {
        try {
            $messages = [
                'number.required' => 'El nombre es obligatorio.',
                'number.max' => 'El nombre no debe tener más de :max caracteres.',
                
            ];
            $this->validate($request, [
                'number' => 'required|string|max:255',
                
            ], $messages);
            // Crear un nuevo paciente
            $equipment = new Equipments();
            $equipment->number = $request->input('number');
            $equipment->typeequipments_id = $request->input('typeequipments_id');
            $equipment->areas_id = $request->input('areas_id');

           
           
            $equipment->save();
    
            return redirect("/equipments")->with('success', 'Equipo creado con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/equipments/create")->with('error', 'No se puede agregar al equipo.');
        }
    }

    public function show($id)
    {
        $equipment = Equipments::find($id);

        if ($equipment) {
            return view('EquipmentShow', compact('equipment'));
        } else {
            return redirect()->route('equipments.index')->with('error', 'Equipo no encontrado.');
        }
    }

    public function edit($id)
    {
        // Aquí debes buscar el area por su ID, suponiendo que tienes un modelo llamado "area"
        $equipment = Equipments::find($id);
        $typeequipments = Typeequipments::all(); // Obtener todos las areas
        $areas = Areas::all(); 
    
        // Luego, puedes retornar la vista de edición junto con el area encontrado
        return view('EquipmentsEdit', compact('equipment','typeequipments','areas'));
    }

    public function update(Request $request, $id)
    {
       // dd($request->all());
                // Validación de datos
                $this->validate($request, [
                    'number' => 'required|string|max:255',
                    
                ]);
        
                // Obtener el area a actualizar
                $equipment = Equipments::find($id);
        
                if (!$equipment) {
                    // Manejar el caso en que el area no se encuentra
                    return redirect()->route('equipments.index')->with('error', 'Equipo no encontrada');
                }
        
                // Actualizar los datos del area
                $equipment->number = $request->input('number');
                $equipment->typeequipments_id = $request->input('typeequipments_id');
                $equipment->areas_id = $request->input('areas_id');
        
                $equipment->save();
        
                return redirect()->route('equipments.index', $equipment->id)->with('success', 'Equipo actualizado con éxito');
    }

    public function destroy($id)
    {
        $equipment = Equipments::find($id);

        if ($equipment) {
            $equipment->refresh();
           
            try {
                $equipment->delete();
                return redirect("/equipments")->with('success', 'El equipo ha sido eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/equipments")->with('error', 'No se puede eliminar el equipo, está siendo utilizado en otra parte del sistema.');
            }
        } else {
            return redirect("/equipments")->with('error', 'Equipo no encontrado');
        }
    }
}
