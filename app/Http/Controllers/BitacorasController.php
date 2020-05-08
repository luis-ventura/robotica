<?php

namespace App\Http\Controllers;

use App\Bitacoras;
use Illuminate\Http\Request;

class BitacorasController extends Controller
{
    public function index()
    {
        $bitacoras = Bitacoras::all();
        return view('bitacoras.index',compact('bitacoras'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
