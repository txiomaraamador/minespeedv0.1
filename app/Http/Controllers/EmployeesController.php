<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees; 
use App\Models\Positions; 

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
      // Verificar si el usuario logueado es administrador
    if ($request->user()->role == 'admin') {
        // Mostrar todos los empleados
        $employees = Employees::with('nameposition')->get();
    } else {
        // Mostrar solo empleados activos para otros usuarios
        $employees = Employees::with('nameposition')->where('status', 'activo')->get();
    }

    return view('EmployeesIndex', compact('employees'));
        
    }

    public function create()
    {
        $positions = Positions::all(); // Obtener todos las areas

        return view('EmployeesCreate', compact('positions'));
    }

    public function store(Request $request)
    {
        try {
            $mensajes = [
                'required' => 'El campo :attribute es obligatorio.',
                'string' => 'El campo :attribute debe ser una cadena de caracteres.',
                'max' => 'El campo :attribute no puede tener más de :max caracteres.',
                'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
                'exists' => 'El valor seleccionado para :attribute no es válido.',
                'numeric' => 'El campo :attribute debe contener solo números.',
            ];
        
            $request->validate([
                'identification_number' => 'required|numeric',
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'license' => 'required|numeric',
                'positions_id' => 'required|exists:positions,id',
            ], $mensajes);

            // Crear un nuevo paciente
            $employee = new Employees();
            $employee->identification_number = $request->input('identification_number');
            $employee->name = $request->input('name');
            $employee->lastname = $request->input('lastname');
            $employee->email = $request->input('email');
            $employee->license = $request->input('license');
            $employee->positions_id = $request->input('positions_id');

           
           
            $employee->save();
    
            return redirect("/employees")->with('success', 'Empleado creado con éxito');
        } catch (\Illuminate\Database\QueryException $e) {
            // Manejar el error de llave foránea
            return redirect("/employees/create")->with('error', 'No se puede agregar al empleado.');
        }
    }

    public function show($id)
    {
        $employee = Employees::find($id);

        if ($employee) {
            return view('EmployeeShow', compact('employee'));
        } else {
            return redirect()->route('employees.index')->with('error', 'Empleado no encontrado.');
        }
    }

    public function edit($id)
    {
        // Aquí debes buscar el area por su ID, suponiendo que tienes un modelo llamado "area"
        $employee = Employees::find($id);
        $positions = Positions::all();
    
        // Luego, puedes retornar la vista de edición junto con el area encontrado
        return view('EmployeesEdit', compact('employee','positions'));
    }

    public function update(Request $request, $id)
    {
       // dd($request->all());
                // Validación de datos
                $mensajes = [
                    'required' => 'El campo :attribute es obligatorio.',
                    'string' => 'El campo :attribute debe ser una cadena de caracteres.',
                    'max' => 'El campo :attribute no puede tener más de :max caracteres.',
                    'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
                    'exists' => 'El valor seleccionado para :attribute no es válido.',
                    'numeric' => 'El campo :attribute debe contener solo números.',
                    'email.unique' => 'Este correo electrónico ya ha sido registrado.',
                ];
            
                $request->validate([
                    'identification_number' => 'required|numeric',
                    'name' => 'required|string|max:255',
                    'lastname' => 'required|string|max:255',
                    'email' => 'required|email|unique:emails,email|max:255',
                    'license' => 'required|numeric',
                    'positions_id' => 'required|exists:positions,id',
                ], $mensajes);
        
                // Obtener el area a actualizar
                $employee = Employees::find($id);
        
                if (!$employee) {
                    // Manejar el caso en que el area no se encuentra
                    return redirect()->route('employees.index')->with('error', 'Empleado no encontrada');
                }
        
                // Actualizar los datos del area
                $employee->identification_number = $request->input('identification_number');
                $employee->name = $request->input('name');
                $employee->lastname = $request->input('lastname');
                $employee->email = $request->input('email');
                $employee->license = $request->input('license');
                $employee->status = $request->input('status');
                $employee->positions_id = $request->input('positions_id');
               
        
                $employee->save();
        
                return redirect()->route('employees.index', $employee->id)->with('success', 'Empleado actualizado con éxito');
    }

    public function destroy($id)
    {
        $employee = Employees::find($id);

        if ($employee) {
            $employee->refresh();
           
            try {
                $employee->delete();
                return redirect("/employees")->with('success', 'El empleado ha sido eliminado con éxito');
            } catch (\Illuminate\Database\QueryException $e) {
                // Manejar la excepción de la base de datos (error de llave foránea)
                return redirect("/employees")->with('error', 'No se puede eliminar el empleado, está siendo utilizado en otra parte del sistema.');
            }
        } else {
            return redirect("/employees")->with('error', 'Empleado no encontrado');
        }
    }
}
