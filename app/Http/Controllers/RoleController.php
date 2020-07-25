<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create',['permissions'=>$permissions]);
    }

    public function store(Request $request)
    {
        //Validate name and permissions field
        $this->validate($request, [
            'name'=>'required|unique:roles|max:10',
            'permissions' =>'required',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];

        $role->save();
        //Looping thru selected permissions
        foreach ($permissions as $permission) 
        {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); 
            //Fetch the newly created role and assign permission
            $role = Role::where('name', '=', $name)->first(); 
            $role->givePermissionTo($p);
        }

        return redirect()->route('roles.index')->withToastSuccess('Se creo el rol '.$role->name);
       
    }

    public function show($id)
    {
        $roles = Role::findOrFail($id);
        return view('roles.show', compact('roles'));
    }

    public function edit($id)
    {
        $roles = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $roles = Role::findOrFail($id);

        $this->validate($request, [
                'name'=>'required|max:10|unique:roles,name,'.$id,
                'permissions' =>'required',
        ]);
        
        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $roles->fill($input)->save();
        $p_all = Permission::all();//Get all permissions
        
        foreach ($p_all as $p) {
            $roles->revokePermissionTo($p); //Remove all permissions associated with role
        }
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->first(); //Get corresponding form //permission in db
            $roles->givePermissionTo($p);  //Assign permission to role
        }

        return redirect()->route('roles.index')->withToastInfo('Actualizado '.$roles->name);
   
    }

    public function destroy($id)
    {
        $roles = Role::findOrFail($id)->delete();
        return redirect()->route('roles.index')->withToastError('Rol Borrado');
    }
}
