<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

/**
 * Class MedicoController
 * @package App\Http\Controllers
 */
class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::paginate(10);

        return view('medico.index', compact('medicos'))
            ->with('i', (request()->input('page', 1) - 1) * $medicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medico = new Medico();
        return view('medico.create', compact('medico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Medico::$rules);

        $medico = Medico::create($request->all());

        return redirect()->route('medicos.index')
            ->with('success', 'Medico created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico = Medico::find($id);

        return view('medico.show', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medico = Medico::find($id);

        return view('medico.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Medico $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        request()->validate(Medico::$rules);

        $medico->update($request->all());

        return redirect()->route('medicos.index')
            ->with('success', 'Medico updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $medico = Medico::find($id)->delete();

        return redirect()->route('medicos.index')
            ->with('success', 'Medico deleted successfully');
    }
    public function getDisponiblesPorServicio($servicio_id)
{
    $disponibles = DB::table('servicios')
    ->join('asignaservicios', 'servicios.id', '=', 'asignaservicios.servicio_id')
    ->join('medicos', 'asignaservicios.medico_id', '=', 'medicos.id')
    ->join('disponibles', 'medicos.id', '=', 'disponibles.medico_id')
    ->join('users', 'medicos.user_id', '=', 'users.id') // Añadir unión con tabla de usuarios para obtener el nombre del médico
    ->where('servicios.id', $servicio_id)
    ->where('disponibles.estado', 'disponible')
    ->select('disponibles.id as disponible_id', 'disponibles.fecha', 'disponibles.hora', 'users.name as medico_nombre') // Añadir el nombre del médico a la selección
    ->distinct()
    ->get();
    
    if ($disponibles->isEmpty()) {
        return response()->json(['message' => 'No hay disponibilidades para este servicio.'], 404);
    }

    return response()->json($disponibles);
}

}
