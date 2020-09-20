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

    public function index(Request $request)
    {
        $created_at = $request->get('created_at');
        $updated_at = $request->get('updated_at');

        $bitacoraservicio = BitacorasSe::created_at($created_at)->updated_at($updated_at)->paginate(10);

        return view('bitacoraservicio.index', compact('bitacoraservicio'));
    }

    public function create()
    {
        $users = User::get();
        return view('bitacoraservicio.create', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'date'       => 'required',
            'adviser'    => 'required',
        ]);

        $bitacoraservicio = new BitacorasSe;
        $bitacoraservicio->fill($request->only('date','adviser'));
        $bitacoraservicio->user_id = auth()->user()->id;
        $bitacoraservicio->save();

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

        if($bitacoraservicio->user_id != \Auth::user()->id) {
            return redirect()->route('bitacoraservicio.index');
        }

        return view('bitacoraservicio.edit', compact('bitacoraservicio', 'users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'date'       => 'required',
            'adviser'    => 'required',
            'updated_at' => 'required',
        ]);

        $bitacoraservicio = BitacorasSe::findOrFail($id);

        $bitacoraservicio->update($request->only('date','adviser','updated_at'));

        return redirect()->route('bitacoraservicio.index')->withToastInfo('Resgistro Actualizado');
    }

    public function destroy($id)
    {
        $bitacoraservicio = BitacorasSe::findOrFail($id);
        $bitacoraservicio->delete();
        return redirect()->route('bitacoraservicio.index')->withToastError('Registro Borrado');
    }
}
