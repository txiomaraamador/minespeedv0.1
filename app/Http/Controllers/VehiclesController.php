<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typevehicles; 
use App\Models\Vehicles;

class VehiclesController extends Controller
{
    public function index(Request $request)
    {
        
        $vehicles = Vehicles::with('nametypevehicle')->get();
        return view('VehiclesIndex', compact('vehicles'));
        
    }

    public function create()
    {
        $typevehicles = Typevehicles::all(); // Obtener todos las areas

        return view('VehiclesCreate', compact('typevehicles'));
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
            $vehicle = new Vehicles();
            $vehicle->serial_number = $request->input('serial_number');
            $vehicle->make = $request->input('make');
            $vehicle->model = $request->input('model');
            $vehicle->manufacture = $request->input('manufacture');
            $vehicle->plate = $request->input('plate');
            $vehicle->tonnage = $request->input('tonnage');
            $vehicle->typevehicles_id = $request->input('typevehicles_id');

           
           
            $vehicle->save();
    
            return redirect("/vehicles")->with('success', 'Vehiculo creado con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/vehicles/create")->with('error', 'No se puede agregar el vehiculo.');
        }
    }

   /* public function show($id)
    {
        $vehicle = Vehicles::find($id);

        if ($vehicle) {
            return view('VehiclesShow', compact('vehicle'));
        } else {
            return redirect()->route('vehicles.index')->with('error', 'vehicle no encontrado.');
        }
    }*/

    public function edit($id)
    {
        // Aquí debes buscar el area por su ID, suponiendo que tienes un modelo llamado "area"
        $vehicle = Vehicles::find($id);
        $typevehicles = Typevehicles::all(); 
    
        // Luego, puedes retornar la vista de edición junto con el area encontrado
        return view('VehiclesEdit', compact('vehicle','typevehicles'));
    }

    public function update(Request $request, $id)
    {
       // dd($request->all());
                // Validación de datos
                $this->validate($request, [
                    'make' => 'required|string|max:255',
                    
                ]);
        
                // Obtener el area a actualizar
                $vehicle = Vehicles::find($id);
        
                if (!$vehicle) {
                    // Manejar el caso en que el area no se encuentra
                    return redirect()->route('vehicles.index')->with('error', 'Vehiculo no encontrado');
                }
        
                // Actualizar los datos del area
                $vehicle->serial_number = $request->input('serial_number');
                $vehicle->make = $request->input('make');
                $vehicle->model = $request->input('model');
                $vehicle->manufacture = $request->input('manufacture');
                $vehicle->plate = $request->input('plate');
                $vehicle->tonnage = $request->input('tonnage');
                $vehicle->typevehicles_id = $request->input('typevehicles_id');
               
        
                $vehicle->save();
        
                return redirect()->route('vehicles.index', $vehicle->id)->with('success', 'Vehiculo actualizado con éxito');
    }

    public function destroy($id)
    {
        $vehicle = Vehicles::find($id);

        if ($vehicle) {
            $vehicle->refresh();
           
            try {
                $vehicle->delete();
                return redirect("/vehicles")->with('success', 'El vehiclulo ha sido eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/vehicles")->with('error', 'No se puede eliminar el vehiculo, está siendo utilizado en otra parte del sistema.');
            }
        } else {
            return redirect("/vehicles")->with('error', 'Vehiculo no encontrado');
        }
    }
}
