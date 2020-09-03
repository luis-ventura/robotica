<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Network;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $net = Network::all();
        return view('home',['net' => $net]);
    }

    public function changeStatus(Request $request)
    {
        $net = Network::find($request->id);
        $net->status = $request->status;
        $net->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
