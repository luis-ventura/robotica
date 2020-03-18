<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::all();
        if (session('success_message')){
            Alert::success('Success!',session('success_message'));
        }
        elseif(session('error_message')){
            Alert::error('Alert!',session('success_message'));
        }
        elseif(session('update_message')){
            Alert::success('Success Update!',session('sucess_message'));
        }
        return view('roles.index',compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $roles = Role::findOrFail($id);
        return view('roles.show', compact('roles'));
    }

    public function edit($id)
    {
        $roles = Role::findOrFail($id);
        return view('roles.edit', compact('roles'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $roles = Role::findOrFail($id);
        return redirect()->route('roles.index')->withErrorMessage('Rol Eliminado');
    }
}
