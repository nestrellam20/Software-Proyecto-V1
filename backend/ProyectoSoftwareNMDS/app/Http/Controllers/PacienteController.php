<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cedula' => 'required|string|max:20|unique:pacientes',
            'nombres' => 'required|string|max:255',
            'sexo' => 'required|string|max:10',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'fecha_nacimiento' => 'required|date',
        ]);

        $paciente = Pacientes::create($validatedData);

        return response()->json(['message' => 'Nuevo paciente agregado'], 201);
    }


    public function index()
    {
        $pacientes = Pacientes::all();

        return response()->json($pacientes, 200);
    }

    public function show($id)
    {
        $paciente = Pacientes::find($id);

        if ($paciente) {
            return response()->json($paciente, 200);
        } else {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cedula' => 'required|string|max:20|unique:pacientes,cedula,' . $id,
            'nombres' => 'required|string|max:255',
            'sexo' => 'required|string|max:10',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'fecha_nacimiento' => 'required|date',
        ]);

        $paciente = Pacientes::find($id);

        if ($paciente) {
            $paciente->update($validatedData);
            return response()->json(['message' => 'Paciente actualizado'], 200);
        } else {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }
    }

    public function destroy($id)
    {
        $paciente = Pacientes::find($id);

        if ($paciente) {
            $paciente->delete();
            return response()->json(['message' => 'Paciente eliminado'], 200);
        } else {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }
    }
}
