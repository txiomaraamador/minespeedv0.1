<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Vehicles;
use App\Models\Vehicle_area;

class Vehicle_areaController extends Controller
{
    public function index(Request $request)
    {
        $vehicle_areas = vehicle_area::with('namevehicle','namearea')->get();
        return view('Vehicle_areaIndex', compact('vehicle_areas'));
    }

    public function create()
    {
        $areas = Areas::all(); // Obtener todos las areas
        $vehicles = Vehicles::all(); // Obtener todos las areas

        return view('vehicle_areaCreate', compact('areas', 'vehicles'));
    }

    public function store(Request $request)
    {
        try {
            $messages = [
                
            ];
            $this->validate($request, [
                
            ], $messages);
            // Crear un nuevo paciente
            $vehicle_area = new Vehicle_area();
            $vehicle_area->areas_id = $request->input('areas_id');
            $vehicle_area->vehicles_id = $request->input('vehicles_id');

            $vehicle_area->save();
    
            return redirect("/vehicle_areas")->with('success', 'Aginacion creado con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/vehicle_areas/create")->with('error', 'No se puede agregar la asignacion.');
        }
    }

   /* public function show($id)
    {
        $employee_vehicle = Equipments::find($id);

        if ($equipment) {
            return view('EquipmentShow', compact('equipment'));
        } else {
            return redirect()->route('equipments.index')->with('error', 'Equipo no encontrado.');
        }
    }*/

    public function edit($id)
    {
        // Aquí debes buscar el area por su ID, suponiendo que tienes un modelo llamado "area"
        $vehicle_area = Vehicle_area::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el area encontrado
        return view('Vehicle_areaEdit', compact('vehicle_area'));
    }

    public function update(Request $request, $id)
    {
       // dd($request->all());
                // Validación de datos
                $this->validate($request, [
                   
                ]);
        
                // Obtener el area a actualizar
                $vehicle_area = Vehicle_area::find($id);
        
                if (!$vehicle_area) {
                    // Manejar el caso en que el area no se encuentra
                    return redirect()->route('vehicle_areas.index')->with('error', 'Asignacion no encontrada');
                }
        
                // Actualizar los datos del area
                $vehicle_area->areas_id = $request->input('areas_id');
                $vehicle_area->vehicles_id = $request->input('vehicles_id');
        
                $vehicle_area->save();
        
                return redirect()->route('vehicle_areas.index', $vehicle_area->id)->with('success', 'Asignacion actualizado con éxito');
    }

    public function destroy($id)
    {
        $vehicle_area = Vehicle_area::find($id);

        if ($vehicle_area) {
            $vehicle_area->refresh();
           
            try {
                $vehicle_area->delete();
                return redirect("/vehicle_areas")->with('success', 'La asignacion ha sido eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/vehicle_areas")->with('error', 'No se puede eliminar la asignacion, está siendo utilizado en otra parte del sistema.');
            }
        } else {
            return redirect("/vehicle_areas")->with('error', 'Asignacion no encontrado');
        }
    }
    public function getAreaDetails($id)
    {
        $area = Areas::find($id);
        //dd($employee);

        if ($area) {
            return response()->json([
                'topographic_information' => $area->topographic_information,
                

                // Agrega otros campos que necesites devolver aquí
            ]);
        } else {
            // Si no se encuentra el empleado, devuelve una respuesta de error
            return response()->json(['error' => 'Area no encontrado'], 404);
        }

    }
}
