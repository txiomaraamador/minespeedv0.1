<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
use App\Models\Vehicles;
use App\Models\Vehicle_area;

class AreasController extends Controller
{
    public function index(Request $request)
    {
        
        $areas = Areas::all();
            
        return view('AreasIndex', compact('areas'));
        
    }

    public function create()
    {
        $areas = Areas::all(); // Obtener todos las areas

        return view('AreasCreate', compact('areas'));
    }

    public function store(Request $request)
    {
        try {
            $messages = [
                'name.required' => 'El nombre es obligatorio.',
                'name.max' => 'El nombre no debe tener más de :max caracteres.',
                'topographic_information.max' => 'La infomacion topografica no debe de tener mas de :max caracteres',
                'topographic_information.required' => 'El campo es obligatorio.',
            ];
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'topographic_information' => 'required|string|max:255',
                
            ], $messages);
            // Crear un nuevo paciente
            $area = new Areas();
            $area->name = $request->input('name');
            $area->topographic_information = $request->input('topographic_information');
           
            $area->save();
    
            return redirect("/areas")->with('success', 'Area creada con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/areas/create")->with('error', 'No se puede agregar el area.');
        }
    }

    public function show($id)
    {
        $area = Areas::find($id);
        
        $vehicle_areas = Vehicle_area::where('areas_id', $area->id)->pluck('vehicles_id')->toArray();
        //dd($vehicle_areas);
        
        //$areas_ids = $vehicle_areas->pluck('areas_id')->toArray();
        //dd($areas_ids);
        $vehicles = Vehicles::with('nametypevehicle')->whereIn('id', $vehicle_areas)->get();
        ($vehicles);

        return view('AreaShowV', compact('area','vehicles'));
    }

    public function edit($id)
    {
        // Aquí debes buscar el area por su ID, suponiendo que tienes un modelo llamado "area"
        $area = Areas::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el area encontrado
        return view('AreasEdit', compact('area'));
    }

    public function update(Request $request, $id)
    {
       // dd($request->all());
                // Validación de datos
                $messages = [
                    'name.required' => 'El nombre es obligatorio.',
                    'name.max' => 'El nombre no debe tener más de :max caracteres.',
                    'topographic_information.max' => 'La infomacion topografica no debe de tener mas de :max caracteres',
                    'topographic_information.required' => 'El campo es obligatorio.',
                ];
                $this->validate($request, [
                    'name' => 'required|string|max:255',
                    'topographic_information' => 'required|string|max:255',
                    
                ], $messages);
        
                // Obtener el area a actualizar
                $area = Areas::find($id);
        
                if (!$area) {
                    // Manejar el caso en que el area no se encuentra
                    return redirect()->route('areas.index')->with('error', 'area no encontrada');
                }
        
                // Actualizar los datos del area
                $area->name = $request->input('name');
                $area->topographic_information = $request->input('topographic_information');
        
                $area->save();
        
                return redirect()->route('areas.index', $area->id)->with('success', 'area actualizado con éxito');
    }

    public function destroy($id)
    {
        $area = Areas::find($id);

        if ($area) {
            $area->refresh();
           
            try {
                $area->delete();
                return redirect("/areas")->with('success', 'El area ha sido eliminads con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/areas")->with('error', 'No se puede eliminar el area está siendo utilizado en otra parte del sistema.');
            }
        } else {
            return redirect("/areas")->with('error', 'area no encontrado');
        }
    }
}
