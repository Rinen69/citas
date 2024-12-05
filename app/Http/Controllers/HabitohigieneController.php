<?php

namespace App\Http\Controllers;

use App\Models\Habitohigiene;
use Illuminate\Http\Request;

/**
 * Class HabitohigieneController
 * @package App\Http\Controllers
 */
class HabitohigieneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitohigienes = Habitohigiene::paginate(10);

        return view('habitohigiene.index', compact('habitohigienes'))
            ->with('i', (request()->input('page', 1) - 1) * $habitohigienes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $habitohigiene = new Habitohigiene();
        return view('habitohigiene.create', compact('habitohigiene'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Habitohigiene::$rules);

        $habitohigiene = Habitohigiene::create($request->all());

        return redirect()->route('habitohigienes.index')
            ->with('success', 'Habitohigiene created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habitohigiene = Habitohigiene::find($id);

        return view('habitohigiene.show', compact('habitohigiene'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habitohigiene = Habitohigiene::find($id);

        return view('habitohigiene.edit', compact('habitohigiene'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Habitohigiene $habitohigiene
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habitohigiene $habitohigiene)
    {
        request()->validate(Habitohigiene::$rules);

        $habitohigiene->update($request->all());

        return redirect()->route('habitohigienes.index')
            ->with('success', 'Habitohigiene updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $habitohigiene = Habitohigiene::find($id)->delete();

        return redirect()->route('habitohigienes.index')
            ->with('success', 'Habitohigiene deleted successfully');
    }
}
