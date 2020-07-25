<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BitacorasSe;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;

class BitacoraServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function exportPdf()
    {
        $bitacoraservicio = BitacorasSe::get();

        $pdf = PDF::loadView('pdf.bitacoraservicio', compact('bitacoraservicio'));

        return $pdf->setPaper('a4','landscape')->stream('bitacoraservicio-list-pdf');
    }

    public function index()
    {
        $bitacoraservicio = BitacorasSe::all();
        return view('bitacoraservicio.index', compact('bitacoraservicio'));
    }

    public function create()
    {
        $users = User::get();
        return view('bitacoraservicio.create', compact('users'));
    }

    public function store(Request $request)
    {
        $bitacoraservicio = BitacorasSe::create($request->all());
        return redirect()->route('bitacoraservicio.index')->withToastSuccess('Registro Añadido');
    }

    public function show($id)
    {
        $bitacoraservicio = BitacorasSe::findOrFail($id);
        return view('bitacoraservicio.show', compact('bitacoraservicio'));
    }

    public function edit($id)
    {
        $bitacoraservicio = BitacorasSe::findOrFail($id);
        $users     = User::all();
        return view('bitacoraservicio.edit', compact('bitacoraservicio', 'users'));
    }

    public function update(Request $request, $id)
    {
        $bitacoraservicio = BitacorasSe::findOrFail($id);

        $bitacoraservicio->date = $request->input('date');
        $bitacoraservicio->save();

        return redirect()->route('bitacoraservicio.index')->withToastInfo('Resgistro Actualizado');
    }

    public function destroy($id)
    {
        $bitacoraservicio = BitacorasSe::findOrFail($id)->delete();
        return redirect()->route('bitacoraservicio.index')->withToastError('Registro Borrado');
    }
}
