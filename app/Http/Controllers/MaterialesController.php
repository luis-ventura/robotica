<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\User;

class MaterialesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $materials = Material::all();
        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        $users= User::all();
        return view('materials.create',compact('users'));
    }

    public function store(Request $request)
    {
        $materials = Material::all();

        $materials->date_material  = $request->input('date_material');
        $materials->material       = $request->input('material');
        $materials->entry_time     = $request->input('entry_time');
        $materials->departure_time = $request->input('departure_time');
        $materials->observation    = $request->input('observation');

        $users = $request['users'];

        $materials->save();

        return redirect()->route('materials.index')->with('Registro Añadido');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
