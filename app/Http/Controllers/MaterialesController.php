<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Material;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;

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
        $this->validate($request,[
            'date_material' => 'required',
            'material'      => 'required',
            'observation'   => 'required'
        ]);

        $materials = new Material;
        $materials->fill($request->only('date_material','material', 'observation'));
        $materials->user_id = auth()->user()->id;
        $materials->save();

        return redirect()->route('materials.index')->withToastSuccess('Registro Añadido');
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

        if($materials->user_id != \Auth::user()->id) {
            return redirect()->route('materials.index');
        }

        return view('materials.edit', compact('materials', 'users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'date_material' => 'required',
            'material'      => 'required',
            'observation'   => 'required'
        ]);

        $materials = Material::findOrFail($id);

        if($materials->user_id != \Auth::user()->id) {
            return redirect()->route('materials.index');
        }

        $materials->update($request->only('date_material','material','observation'));

        return redirect()->route('materials.index')->withToastInfo('Resgistro Actualizado');
    }

    public function destroy($id)
    {
        $materials = Material::findOrFail($id);

        if($materials->user_id != \Auth::user()->id) {
            return redirect()->route('materials.index');
        }

        $materials->delete();
        return redirect()->route('materials.index')->withToastError('Material Borrado');
    }
}
