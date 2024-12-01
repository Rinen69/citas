<?php

namespace App\Http\Controllers;

use App\Models\Triaje;
use App\Models\Concultas;
use Illuminate\Http\Request;

/**
 * Class TriajeController
 * @package App\Http\Controllers
 */
class TriajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $triajes = Triaje::paginate(10);

        return view('triaje.index', compact('triajes'))
            ->with('i', (request()->input('page', 1) - 1) * $triajes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $triaje = new Triaje();
        return view('triaje.create', compact('triaje'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Triaje::$rules);

        $triaje = Triaje::create($request->all());

        return redirect()->route('triajes.index')
            ->with('success', 'Triaje created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $triaje = Triaje::find($id);

        return view('triaje.show', compact('triaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $triaje = Triaje::find($id);

        return view('triaje.edit', compact('triaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Triaje $triaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Triaje $triaje)
    {
        request()->validate(Triaje::$rules);

        $triaje->update($request->all());

        return redirect()->route('triajes.index')
            ->with('success', 'Triaje updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $triaje = Triaje::find($id)->delete();

        return redirect()->route('triajes.index')
            ->with('success', 'Triaje deleted successfully');
    }
}
