<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Asignaservicio;

use App\Models\User;
use App\Models\Servicio;
use App\Models\Disponible;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

/**
 * Class ConsultaController
 * @package App\Http\Controllers
 */
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $consultas = Consulta::paginate(10);

        
        return view('consulta.index', compact('consultas'))
            ->with('i', (request()->input('page', 1) - 1) * $consultas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder.');
        }
        $consulta = new Consulta();
        $pacientes=paciente::all();
        //$paciente = Auth::paciente();
        $servicios=Servicio::all();
        $disponibles=Disponible::all();
        return view('consulta.create', compact('consulta','pacientes','servicios','disponibles'));
    }*/
    /*
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder.');
        }

        $consulta = new Consulta();

        // Obtén el paciente asociado al usuario autenticado
        $paciente = Paciente::where('user_id', Auth::id())->first();

        if (!$paciente) {
            return redirect()->route('home')->with('error', 'Solo los pacientes registrados pueden crear consultas.');
        }

        $servicios = Servicio::all();
        $disponibles = Disponible::all();

        return view('consulta.create', compact('consulta', 'paciente', 'servicios', 'disponibles'));
    }
*/
public function create()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder.');
    }

    $consulta = new Consulta();
    //$pacientes = Paciente::with('user')->get(); // Cargar los usuarios relacionados
    $paciente = Paciente::where('user_id', Auth::id())->first();
    $servicios = Servicio::all();
    $disponibles = Disponible::all();

    return view('consulta.create', compact('consulta', 'paciente', 'servicios', 'disponibles'));
}

public function getDisponibles(Request $request)
{
    $request->validate(['servicio_id' => 'required|exists:servicios,id']);

    // Obtener médicos asignados al servicio seleccionado
    $medicos = Asignaservicio::where('servicio_id', $request->servicio_id)->pluck('medico_id');

    // Validar que existen médicos
    if ($medicos->isEmpty()) {
        return response()->json([], 200); // No hay médicos disponibles
    }

    // Obtener horarios disponibles de los médicos asignados
    $disponibles = Disponible::whereIn('medico_id', $medicos)
        ->where('estado', 'disponible')
        ->get(['id', 'fecha', 'hora']);

    return response()->json($disponibles);
}





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Consulta::$rules);

        $consulta = Consulta::create($request->all());

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = Consulta::find($id);

        return view('consulta.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Consulta::find($id);
        $pacientes=paciente::all();
        $servicios=Servicio::all();
        $disponibles=Disponible::all();
        return view('consulta.create', compact('consulta','pacientes','servicios','disponibles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        request()->validate(Consulta::$rules);

        $consulta->update($request->all());

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $consulta = Consulta::find($id)->delete();

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta deleted successfully');
    }
}
