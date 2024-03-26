<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Positions;

class PositionsController extends Controller
{
    public function index(Request $request)
    {
        
        $positions = Positions::all();
            
        return view('PositionsIndex', compact('positions'));
        
    }

    public function create()
    {
        $position = Positions::all(); // Obtener todos las areas

        return view('PositionsCreate', compact('position'));
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
            $position = new Positions();
            $position->name = $request->input('name');
           
           
            $position->save();
    
            return redirect("/positions")->with('success', 'Cargo creado con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/positions/create")->with('error', 'No se puede agregar el cargo.');
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
        $position = Positions::find($id);
    
        // Luego, puedes retornar la vista de edición junto con el area encontrado
        return view('PositionsEdit', compact('position'));
    }

    public function update(Request $request, $id)
    {
       // dd($request->all());
                // Validación de datos
                $this->validate($request, [
                    'name' => 'required|string|max:255',
                    
                ]);
        
                // Obtener el area a actualizar
                $position = Positions::find($id);
        
                if (!$position) {
                    // Manejar el caso en que el area no se encuentra
                    return redirect()->route('positions.index')->with('error', 'cargo no encontrada');
                }
        
                // Actualizar los datos del area
                $position->name = $request->input('name');
                
        
                $position->save();
        
                return redirect()->route('positions.index', $position->id)->with('success', 'cargo actualizado con éxito');
    }

    public function destroy($id)
    {
        $position = Positions::find($id);

        if ($position) {
            $position->refresh();
           
            try {
                $position->delete();
                return redirect("/positions")->with('success', 'El cargo ha sido eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/positions")->with('error', 'No se puede eliminar el cargo está siendo utilizado en otra parte del sistema.');
            }
        } else {
            return redirect("/positions")->with('error', 'cargo no encontrado');
        }
    }
}
