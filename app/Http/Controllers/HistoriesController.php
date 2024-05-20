<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Histories;
use App\Models\Equipments;
use App\Models\Employee_vehicle;
use App\Models\Vehicles;
use App\Models\Typevehicles;
use App\Models\Employees;
use App\Models\Positions;
use App\Models\Typeequipments;
use App\Models\Areas;
use App\Models\Reports;

class HistoriesController extends Controller
{
    public function index(Request $request)
    {
        $histories = Histories::with('employee_vehicle.nameemployee', 'employee_vehicle.namevehicle', 'nameequipment.namearea')->get();

        return view('HistoriesIndex', compact('histories'));
    }
    public function create($id)
    {
        // Ruta del script Python
        $scriptPath = base_path('public/decode_image.py');
    
        // Comando a ejecutar
        $command = 'python ' . escapeshellarg($scriptPath) . ' ' . escapeshellarg($id);
    
        // Ejecutar el comando y capturar la salida y cualquier error
        $output = shell_exec($command . ' 2>&1'); // Capture both output and errors

        // Verificar si la ejecución fue exitosa
        if ($output === null) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error ejecutando el script Python',
                'command' => $command
            ], 500);
        }

        $reports = Reports::find($id);
        $speed = $reports->speed;
        $camera_ip = $reports->camera_ip;
        $vehicles = Vehicles::all();
        $employeeVehicles = Employee_vehicle::all();
        $equipments = Equipments::where('number',$camera_ip)->firstOrFail();
      
        $area = Areas::where('id', $equipments->areas_id)->firstOrFail();
      //  dd($area);
        $zona = $area->name;
        

        return view('HistoriesCreate', compact('vehicles', 'employeeVehicles', 
            'equipments', 'reports', 'output','id','speed','camera_ip','zona'));
}

    public function store(Request $request)
    {
        try {
            $request->validate([
                'date' => 'required',
                'message' => 'required|max:150',
                'speed' => 'required',
                'photo' => 'nullable',
                'plate' => 'required', 
                'number' => 'required',
            ]);///dd($request->all());
    
        
                   // Busca el vehículo por la placa ingresada por el usuario
                    $vehicle = Vehicles::where('plate', $request->input('plate'))->firstOrFail();
                    //dd($vehicle);
                    // Busca el registro en la tabla employee_vehicles utilizando el ID del vehículo
                    $employeeVehicle = Employee_vehicle::where('vehicles_id', $vehicle->id)->firstOrFail();
                    //dd($employeeVehicle);
                    // Obtiene el ID del registro de employee_vehicles
                    $employeeVehicleId = $employeeVehicle->id;
                    //dd($employeeVehicleId);
                    // Busca el vehículo por la placa ingresada por el usuario
                    $equipment = Equipments::where('number', $request->input('number'))->firstOrFail();
                    
                    // Obtiene el ID del registro de employee_vehicles
                    $employeeVehicleId = $employeeVehicle->id;

                    $equipmentId = $equipment->id;
            // Crear un nuevo historial
            $historie = new Histories();
            $historie->date = $request->input('date');
            $historie->message = $request->input('message');
            $historie->speed = $request->input('speed');
            $historie->photo = $request->input('photo');
            $historie->employee_vehicle_id = $employeeVehicleId; 
            $historie->equipments_id = $equipmentId;
            $historie->reports_id = $request->input('reports_id');
//dd($historie);
            
            $historie->save();
    
            return redirect("/histories")->with('success', 'Registrado en el historial');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect("/histories/create")->with('error', 'No se pudo hacer el registro.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect("/histories/create")->with('error', 'La placa del vehículo o el número del equipo no fueron encontrados.');
        } catch (\Exception $e) {
            return redirect("/histories/create")->with('error', 'Ocurrió un error al procesar la solicitud.');
        }
    }
         
    public function show($id)
    {
        $histories = Histories::find($id);
        
        $employeeVehicle = Employee_vehicle::where('id', $histories->employee_vehicle_id)->firstOrFail();
        
        $vehicle = Vehicles::where('id', $employeeVehicle->vehicles_id)->first();
        $typevehicle = Typevehicles::where('id', $vehicle->typevehicles_id)->first();
        
        $employee = Employees::where('id', $employeeVehicle->employees_id)->first();
        $position = Positions::where('id', $employee->positions_id)->first();

        $equipment = Equipments::where('id', $histories->equipments_id)->firstOrFail();
        $typeequipment = Typeequipments::where('id', $equipment->typeequipments_id)->first();
        $area = Areas::where('id', $equipment->areas_id)->first();
        
        return view('HistoriesShow', compact('histories', 'vehicle', 'typevehicle','employee','position','equipment','typeequipment','area'));

    }
    public function getVechileDetails($plate)
    {
        
        $vehicle = Vehicles::where('plate', $plate)->first();
        //dd($vehicle);
        // Busca el registro en la tabla employee_vehicles utilizando el ID del vehículo
        $employeeVehicle = Employee_vehicle::where('vehicles_id', $vehicle->id)->firstOrFail();
        //dd($employeeVehicle);
        $employeeVehicleId = $employeeVehicle->employees_id;

        $employee = Employees::where('id', $employeeVehicleId)->firstOrFail();
       // dd($employee);
        
        if ($vehicle) {
            return response()->json([
                'serial_number' => $vehicle->serial_number,
                'make' => $vehicle->make,
                'model' => $vehicle->model,
                'manufacture' => $vehicle->manufacture,
                'tonnage' => $vehicle->tonnage,
                'typevehicles_id' => $vehicle->nametypevehicle->name,
                
                'identification_number' => $employee->identification_number,
                'name' => $employee->name,
               // 'lastname' => $employee->lastname,
                'email' => $employee->email,
                'license' => $employee->license,
                'positions_id' => $employee->nameposition->name,
                // Agrega otros campos que necesites devolver aquí
            ]);
        } else {
            // Si no se encuentra el empleado, devuelve una respuesta de error
            return response()->json(['error' => 'Vehiculo no encontrado'], 404);
        }
    }
    public function destroy($id)
    {
        $histories = Histories::find($id);

             
    }
}

