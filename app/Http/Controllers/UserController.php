<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->ajax())
        {
            $users = User::all();
            return DataTables::of($users)
            ->addColumn('rol', function($user){
                foreach($user->roles as $role)
                {
                    return $role->name;
                }
            })
            ->addColumn('action','users.action')
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('users.index');
    }

    public function create()
    {
        $roles = Role::get();
        return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'           => 'required|max:80',
            'lastname'       => 'required|max:80',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|min:8|confirmed',
            'control_number' => 'required|max:8|unique:users,control_number',
            'career'         => 'required',
            'activity'       => 'required',
            'roles'          => 'required|array',
        ]);

        $request->request->add([
            'password' => bcrypt($request->password)
        ]);

        $user = User::create($request->all());

        $roles = Role::find($request->roles);

        $roles->each(function($role) use($user) {
            $user->assignRole($role);
        });

        return redirect()->route('users.index')->withToastSuccess('Usuario Creado');
    }

    public function show($id)
    {
        $users   = User::findOrFail($id);
        return view('users.show', ['users' => $users]);
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', ['users' => $users, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $this->validate(request(),
            ['name'           => ['required','max:50']],
            ['lastname'       => ['required','max:50']],
            ['email'          => ['required', 'email', 'max:255', 'unique:users,email,'.$id]],
            ['career'         => ['required']],
            ['control_number' => ['required','control_number','max:8','unique:users,control_number'.$id]],
            ['activity'       => ['required']],
            ['avatar'         => ['required','image']],
            ['password'       => ['confirmed']
            ]);

        $users->fill($request->only('name','lastname','email','career','control_number','activity','avatar','password'));
        $roles = Role::find($request->roles);
        $file  = $request->get('avatar');

        if($file != null or $request->hasFile('avatar'))
        {
            $fileNameWithTheExtension = request('avatar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
            $extension = request('avatar')->getClientOriginalExtension();
            $newFileName = $fileName . '_' . time() . '.' . $extension;
            $path = request('avatar')->storeAs('public/avatar', $newFileName);
            $users->avatar   = $newFileName;
        }
        else
        {
            unset($users->avatar);
        }

        $pass = $request->get('password');

        if($pass != null )
        {
            $users->password= bcrypt($request->get('password'));
        }
        else
        {
            unset($users->password);
        }

        $users->save();

        if($users->hasAnyRole($roles))
        {
            $users->syncRoles($roles);
        }

        return redirect()->route('users.index')->withToastInfo('Usuario Actualizado');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->withToastError('Usuario Eliminado');
    }
}
