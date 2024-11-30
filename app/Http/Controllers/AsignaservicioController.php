<?php

namespace App\Http\Controllers;

use App\Models\Asignaservicio;
use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Medico;

/**
 * Class AsignaservicioController
 * @package App\Http\Controllers
 */
class AsignaservicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaservicios = Asignaservicio::paginate(10);

        return view('asignaservicio.index', compact('asignaservicios'))
            ->with('i', (request()->input('page', 1) - 1) * $asignaservicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaservicio = new Asignaservicio();
        $servicios=Servicio::all();
        $medicos=Medico::all();
        return view('asignaservicio.create', compact('asignaservicio','servicios','medicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Asignaservicio::$rules);

        $asignaservicio = Asignaservicio::create($request->all());

        return redirect()->route('asignaservicios.index')
            ->with('success', 'Asignaservicio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignaservicio = Asignaservicio::find($id);

        return view('asignaservicio.show', compact('asignaservicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignaservicio = Asignaservicio::find($id);
        $servicios=Servicio::all();
        $medicos=Medico::all();
        return view('asignaservicio.create', compact('asignaservicio','servicios','medicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asignaservicio $asignaservicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignaservicio $asignaservicio)
    {
        request()->validate(Asignaservicio::$rules);

        $asignaservicio->update($request->all());

        return redirect()->route('asignaservicios.index')
            ->with('success', 'Asignaservicio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asignaservicio = Asignaservicio::find($id)->delete();

        return redirect()->route('asignaservicios.index')
            ->with('success', 'Asignaservicio deleted successfully');
    }
}
