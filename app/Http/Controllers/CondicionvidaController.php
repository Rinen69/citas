<?php

namespace App\Http\Controllers;

use App\Models\Condicionvida;
use Illuminate\Http\Request;

/**
 * Class CondicionvidaController
 * @package App\Http\Controllers
 */
class CondicionvidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condicionvidas = Condicionvida::paginate(10);

        return view('condicionvida.index', compact('condicionvidas'))
            ->with('i', (request()->input('page', 1) - 1) * $condicionvidas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $condicionvida = new Condicionvida();
        return view('condicionvida.create', compact('condicionvida'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Condicionvida::$rules);

        $condicionvida = Condicionvida::create($request->all());

        return redirect()->route('condicionvidas.index')
            ->with('success', 'Condicionvida created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $condicionvida = Condicionvida::find($id);

        return view('condicionvida.show', compact('condicionvida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $condicionvida = Condicionvida::find($id);

        return view('condicionvida.edit', compact('condicionvida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Condicionvida $condicionvida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Condicionvida $condicionvida)
    {
        request()->validate(Condicionvida::$rules);

        $condicionvida->update($request->all());

        return redirect()->route('condicionvidas.index')
            ->with('success', 'Condicionvida updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $condicionvida = Condicionvida::find($id)->delete();

        return redirect()->route('condicionvidas.index')
            ->with('success', 'Condicionvida deleted successfully');
    }
}
