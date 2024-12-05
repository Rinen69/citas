<?php

namespace App\Http\Controllers;

use App\Models\Asignrole;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

/**
 * Class AsignroleController
 * @package App\Http\Controllers
 */
class AsignroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignroles = Asignrole::paginate(10);

        return view('asignrole.index', compact('asignroles'))
            ->with('i', (request()->input('page', 1) - 1) * $asignroles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignrole = new Asignrole();
        $roles=Role::all();
        $users=User::all();
        return view('asignrole.create', compact('asignrole','roles','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Asignrole::$rules);

        $asignrole = Asignrole::create($request->all());

        return redirect()->route('asignroles.index')
            ->with('success', 'Asignrole created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignrole = Asignrole::find($id);

        return view('asignrole.show', compact('asignrole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignrole = Asignrole::find($id);

        return view('asignrole.edit', compact('asignrole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asignrole $asignrole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignrole $asignrole)
    {
        request()->validate(Asignrole::$rules);

        $asignrole->update($request->all());

        return redirect()->route('asignroles.index')
            ->with('success', 'Asignrole updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asignrole = Asignrole::find($id)->delete();

        return redirect()->route('asignroles.index')
            ->with('success', 'Asignrole deleted successfully');
    }
}
