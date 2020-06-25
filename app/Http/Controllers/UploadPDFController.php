<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
use Storage;

class UploadPDFController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('uploadpdf.index')->with([
            'pdfs' => Upload::with('user')->paginate(10)
        ]);
    }

    public function create()
    {
        return view('uploadpdf.create');
    }

    public function store(Request $request)
    {
       $this->validate($request, [
            'upload' => 'required|mimes:pdf'
        ]);

        $request->user()->uploads()->create([
            'upload' => $request->file('upload')->store('/pdfs', 'public'),
        ]);

        return redirect()->route('uploadpdf.index');
    }

    public function show(Upload $uploadpdf)
    {
        //return Storage::disk('public')->download($uploadpdf->upload);
        return Storage::disk('public')->response($uploadpdf->upload);
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
