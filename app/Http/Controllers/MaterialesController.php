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
        $users = User::get();
        return view('materials.create',compact('users'));
    }

    public function store(Request $request)
    {
        $materials = Material::create($request->all());
        return redirect()->route('materials.index')->with('Registro Añadido');
    }

    public function show($id)
    {
        $materials = Material::findOrFail($id);
        return view('materials.show', compact('materials'));
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
