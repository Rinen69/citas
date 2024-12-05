<?php

namespace App\Http\Controllers;

use App\Models\Habitoalimento;
use Illuminate\Http\Request;

/**
 * Class HabitoalimentoController
 * @package App\Http\Controllers
 */
class HabitoalimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitoalimentos = Habitoalimento::paginate(10);

        return view('habitoalimento.index', compact('habitoalimentos'))
            ->with('i', (request()->input('page', 1) - 1) * $habitoalimentos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $habitoalimento = new Habitoalimento();
        return view('habitoalimento.create', compact('habitoalimento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Habitoalimento::$rules);

        $habitoalimento = Habitoalimento::create($request->all());

        return redirect()->route('habitoalimentos.index')
            ->with('success', 'Habitoalimento created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habitoalimento = Habitoalimento::find($id);

        return view('habitoalimento.show', compact('habitoalimento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habitoalimento = Habitoalimento::find($id);

        return view('habitoalimento.edit', compact('habitoalimento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Habitoalimento $habitoalimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habitoalimento $habitoalimento)
    {
        request()->validate(Habitoalimento::$rules);

        $habitoalimento->update($request->all());

        return redirect()->route('habitoalimentos.index')
            ->with('success', 'Habitoalimento updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $habitoalimento = Habitoalimento::find($id)->delete();

        return redirect()->route('habitoalimentos.index')
            ->with('success', 'Habitoalimento deleted successfully');
    }
}
