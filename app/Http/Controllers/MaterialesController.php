<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Material;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;

class MaterialesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function exportPdf()
    {
        $materials = Material::get();

        $pdf = PDF::loadView('pdf.materials', compact('materials'));

        return $pdf->setPaper('a4','landscape')->stream('lista-materiales.pdf');
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
        $materials = Material::findOrFail($id);
        $users     = User::all();
        return view('materials.edit', compact('materials', 'users'));
    }

    public function update(Request $request, $id)
    {
        $materials = Material::findOrFail($id);

        $materials->date_material = $request->input('date_material');
        $materials->material      = $request->input('material');
        $materials->observation   = $request->input('observation');
        $materials->save();

        return redirect()->route('materials.index')->with('Resgistro Actualizado');
    }

    public function destroy($id)
    {
        $materials = Material::findOrFail($id)->delete();
        return redirect()->route('materials.index')->with('Material Borrado');
    }
}
