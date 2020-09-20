<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visit;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;

class VisitController extends Controller
{
    public function exportPdf()
    {
        $visits = Visit::get();

        $pdf = PDF::loadView('pdf.visita', compact('visits'));

        return $pdf->setPaper('a4','landscape')->stream('visita-list-pdf');
    }

    public function index(Request $request)
    {
        $created_at = $request->get('created_at');
        $updated_at = $request->get('updated_at');

        $visits = Visit::created_at($created_at)->updated_at($updated_at)->paginate(10);

        return view('visits.index', compact('visits'));
    }

    public function create()
    {
        $users = User::get();
        return view('visits.create', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'date'       => 'required',
            'assessor'   => 'required',
        ]);

        $visits = new Visit;
        $visits->fill($request->only('date','assessor'));
        $visits->user_id = auth()->user()->id;
        $visits->save();

        return redirect()->route('visits.index')->withToastSuccess('Registro Añadido');
    }

    public function show($id)
    {
        $visits = Visit::findOrFail($id);
        return view('visits.show', compact('visits'));
    }

    public function edit($id)
    {
        $visits = Visit::findOrFail($id);
        $users  = User::all();
        return view('visits.edit', compact('visits', 'users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'date'       => 'required',
            'assessor'   => 'required',
            'updated_at' => 'required',
        ]);

        $visits = Visit::findOrFail($id);
        $visits->update($request->only('date','assessor','updated_at'));

        return redirect()->route('visits.index')->withToastInfo('Resgistro Actualizado');
    }

    public function destroy($id)
    {
        $visits = Visit::findOrFail($id);
        $visits->delete();
        return redirect()->route('visits.index')->withToastError('Registro Borrado');
    }
}
