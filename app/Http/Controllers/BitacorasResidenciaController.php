<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BitacorasR;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;
class BitacorasResidenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function exportPdf()
    {
        $bitacorasresidencia = BitacorasR::get();

        $pdf = PDF::loadView('pdf.bitacorasresidencia', compact('bitacorasresidencia'));

        return $pdf->setPaper('a4','landscape')->stream('bitacorasresidencia-list-pdf');
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
        $this->validate($request,[
            'date'       => 'required',
        ]);

        $bitacorasresidencia = new BitacorasR;
        $bitacorasresidencia->fill($request->only('date'));
        $bitacorasresidencia->user_id = auth()->user()->id;
        $bitacorasresidencia->save();

        return redirect()->route('bitacorasresidencia.index')->withToastSuccess('Registro Añadido');
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

        if($bitacorasresidencia->user_id != \Auth::user()->id) {
            return redirect()->route('bitacorasresidencia.index');
        }

        return view('bitacorasresidencia.edit', compact('bitacorasresidencia', 'users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'date'       => 'required',
        ]);

        $bitacorasresidencia = BitacorasR::findOrFail($id);

        if($bitacorasresidencia->user_id != \Auth::user()->id) {
            return redirect()->route('bitacorasresidencia.index');
        }

        $bitacorasresidencia->update($request->only('date'));

        return redirect()->route('bitacorasresidencia.index')->withToastInfo('Resgistro Actualizado');
    }

    public function destroy($id)
    {
        $bitacorasresidencia = BitacorasR::findOrFail($id);

        if($bitacorasresidencia->user_id != \Auth::user()->id) {
            return redirect()->route('bitacorasresidencia.index');
        }

        $bitacorasresidencia->delete();
        return redirect()->route('bitacorasresidencia.index')->withToastError('Registro Borrado');
    }
}
