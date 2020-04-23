<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $permissions = Permission::all();

        if (session('success_message')) 
        {
            Alert::success('Permiso Creado',session('success_message'));
        }
        elseif(session('error_message'))
        {
            Alert::error('Permiso Eliminado',session('error_message'));
        }
        elseif(session('update_message'))
        {
            Alert::success('Permiso Actualizado',session('update_message'));
        }

        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        $roles = Role::get(); //Get all roles
        return view('permissions.create')->with('roles', $roles);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

        return redirect()->route('permissions.index')->withSuccessMessage('Permiso Creado '.$permission->name);
    }

    public function show($id)
    {
        $permissions = Permission::findOrFail($id);
        return redirect()->route('permissions');
    }

    public function edit($id)
    {
        $permissions = Permission::findOrFail($id);
        return view('permissions.edit', compact('permissions'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $input = $request->all();
        $permission->fill($input)->save();

        return redirect()->route('permissions.index')->withUpdateMessage('Permiso Actualizado '.$permission->name);
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        //Make it impossible to delete this specific permission    
        if ($permission->name == "user_delete") 
        {
            return redirect()->route('permissions.index')->withErrorMessage('No puedes eliminar este permiso');
        }

        $permission->delete();

        return redirect()->route('permissions.index')->withErrorMessage('Permiso Borrado');
    }
}
