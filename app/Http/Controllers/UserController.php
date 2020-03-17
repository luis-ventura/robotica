<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $buscar = $request->get('buscarpor');
        $tipo   = $request->get('tipo');

        $users = User::buscarpor($tipo,$buscar)->paginate(8);
    
        if (session('success_message')) 
        {
            Alert::success('Success!',session('success_message'));
        }
        elseif(session('error_message'))
        {
            Alert::error('Alert!',session('success_message'));
        }
        elseif(session('update_message'))
        {
            Alert::success('Success Update!',session('sucess_message'));
        }

        return view('users.index',compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $users = new User();
        $users->name          = $request->input('name');
        $users->email         = $request->input('email');
        $users->password      = Hash::make($request->input('password'));
        $users->save();

        $users->assignRole('student');

        return redirect()->route('users.index')->withSuccessMessage('Usuario Creado');
    }

    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('users.show', compact('users'));
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path('avatar/'), $name);
        }

        $users->name          = $request->input('name');
        $users->email         = $request->input('email');
        $users->password      = Hash::make($request->input('password'));
        $users->lastname      = $request->input('lastname');
        $users->avatar        = $name;
        $users->save();
            
        return redirect()->route('users.index')->withUpdateMessage('Usuario Actualizado');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->withErrorMessage('Usuario Eliminado');
    }
}
