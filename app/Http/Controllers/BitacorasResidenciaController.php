<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BitacorasR;
use App\User;

class BitacorasResidenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bitacorasresidencia = BitacorasR::all();
        return view('bitacorasresidencia.index', compact('bitacorasresidencia'));
    }

    public function create()
    {
        $users = User::get();
        return view('bitacorasresidencia.create',compact('users'));
    }

    public function store(Request $request)
    {
        $bitacorasresidencia = BitacorasR::create($request->all());
        return redirect()->route('bitacorasresidencia.index')->with('Registro Añadido');
    }

    public function show($id)
    {
        $bitacorasresidencia = BitacorasR::findOrFail($id);
        return view('bitacorasresidencia.show', compact('bitacorasresidencia'));
    }

    public function edit($id)
    {
        $bitacorasresidencia = BitacorasR::findOrFail($id);
        $users     = User::all();
        return view('bitacorasresidencia.edit', compact('bitacorasresidencia', 'users'));
    }

    public function update(Request $request, $id)
    {
        $bitacorasresidencia = BitacorasR::findOrFail($id);

        $bitacorasresidencia->date = $request->input('date');
        $bitacorasresidencia->save();

        return redirect()->route('bitacorasresidencia.index')->with('Resgistro Actualizado');
    }

    public function destroy($id)
    {
        $bitacorasresidencia = BitacorasR::findOrFail($id)->delete();
        return redirect()->route('bitacorasresidencia.index')->with('Registro Borrado');
    }
}
