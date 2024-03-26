<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Vehicles;
use App\Models\Employee_vehicle;

class Employee_vehicleController extends Controller
{
    public function index(Request $request)
    {
        $employee_vehicles = Employee_vehicle::with('nameemployee','namevehicle')->get();
        return view('Employee_vehiclesIndex', compact('employee_vehicles'));
    }

    public function create()
    {
        $employees = Employees::all(); // Obtener todos las areas
        $vehicles = Vehicles::all(); // Obtener todos las areas

        return view('Employee_vehiclesCreate', compact('employees', 'vehicles'));
    }

    public function store(Request $request)
    {
        try {
            $messages = [
                
            ];
            $this->validate($request, [
                
            ], $messages);
            // Crear un nuevo paciente
            $employee_vehicle = new Employee_vehicle();
            $employee_vehicle->employees_id = $request->input('employees_id');
            $employee_vehicle->vehicles_id = $request->input('vehicles_id');

            $employee_vehicle->save();
    
            return redirect("/employee_vehicles")->with('success', 'Aginacion creado con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/employee_vehicles/create")->with('error', 'No se puede agregar la asignacion.');
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
        $employee_vehicle = Employee_vehicle::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el area encontrado
        return view('Employee_vehiclesEdit', compact('employee_vehicle'));
    }

    public function update(Request $request, $id)
    {
       // dd($request->all());
                // Validación de datos
                $this->validate($request, [
                   
                ]);
        
                // Obtener el area a actualizar
                $employee_vehicle = Employee_vehicle::find($id);
        
                if (!$employee_vehicle) {
                    // Manejar el caso en que el area no se encuentra
                    return redirect()->route('employee_vehicles.index')->with('error', 'Asignacion no encontrada');
                }
        
                // Actualizar los datos del area
                $employee_vehicle->employees_id = $request->input('employees_id');
                $employee_vehicle->vehicles_id = $request->input('vehicles_id');
        
                $employee_vehicle->save();
        
                return redirect()->route('employee_vehicles.index', $employee_vehicle->id)->with('success', 'Asignacion actualizado con éxito');
    }

    public function destroy($id)
    {
        $employee_vehicle = Employee_vehicle::find($id);

        if ($employee_vehicle) {
            $employee_vehicle->refresh();
           
            try {
                $employee_vehicle->delete();
                return redirect("/employee_vehicles")->with('success', 'La asignacion ha sido eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/employee_vehicles")->with('error', 'No se puede eliminar la asignacion, está siendo utilizado en otra parte del sistema.');
            }
        } else {
            return redirect("/employee_vehicles")->with('error', 'Asignacion no encontrado');
        }
    }
}
