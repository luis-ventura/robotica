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

    public function index(Request $request)
    {   
        $created_at = $request->get('created_at');
        $updated_at = $request->get('updated_at');
        //$date       = $request->get('date');
        //$bitacorasresidencia = BitacorasR::created_at($created_at)->updated_at($updated_at)->date($date)->paginate(10); 

        $bitacorasresidencia = BitacorasR::created_at($created_at)->updated_at($updated_at)->paginate(10); 
        return view('bitacorasresidencia.index',['bitacorasresidencia'=> $bitacorasresidencia]);
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
            'updated_at' => 'required',
        ]);

        $bitacorasresidencia = BitacorasR::findOrFail($id);

        if($bitacorasresidencia->user_id != \Auth::user()->id) {
            return redirect()->route('bitacorasresidencia.index');
        }

        $bitacorasresidencia->update($request->only('date', 'updated_at'));

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
