<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        return view('users.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|max:80',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'roles' => 'required|array',
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
        $users = User::findOrFail($id);
        return view('users.show', compact('users'));
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::get();
        return view('users.edit', compact('users','roles'));
    }

    /*public function update(Request $request, $id)
    {
        /*$this->validate($request,[
            'name'           => 'required|max:80',
            'lastname'       => 'required|max:80',
            'email'          => 'required|email|unique:users',
            'control_number' => 'required|control_number|unique:users',
            'career'         => 'required|career|unique:users',
            'activity'       => 'required|activity|unique:users',
            'avatar'         => 'required|avatar|mimes:jpg,png|max:255'
        ]);

        $users = User::findOrFail($id);

        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path('avatar/'), $name);
        }

        $users->name           = $request->input('name');
        $users->lastname       = $request->input('lastname');
        $users->email          = $request->input('email');
        $users->control_number = $request->input('control_number');
        $users->career         = $request->input('career');
        $users->activity       = $request->input('activity');
        $users->avatar         = $name;
        $users->save();

        return redirect()->route('users.show',$users->id)->withToastInfo('Usuario Actualizado');
    }*/

    public function update(Request $request, $id)
    {
        $this->validate(request(),
            ['name'           => ['required','max:50']],
            ['lastname'       => ['required','max:50']],
            ['email'          => ['required', 'email', 'max:255', 'unique:users,email,'.$id]],
            ['career'         => ['required']],
            ['control_number' => ['required']],
            ['activity'       => ['required']],
            ['avatar'         => ['required','image']
            ]);

        $users = User::findOrFail($id);

        $users->name = $request->get('name');
        $users->lastname       = $request->get('lastname');
        $users->email          = $request->get('email');
        $users->control_number = $request->get('control_number');
        $users->career         = $request->get('career');
        $users->activity       = $request->get('activity');

        $file = $request->get('avatar');

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

        /*$input = $request->except('roles');

        $users->fill($input)->save();
        if ($request->roles <> '') {
            $users->roles()->sync($request->roles);
        }
        else {
            $users->roles()->detach();
        }*/

        $roles = Role::find($request->roles);

        $roles->each(function($role) use($users) {
            $users->assignRole($role);
        });

        $users->update();

        return redirect()->route('users.show',$users->id)->withToastInfo('Usuario Actualizado');;
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->withToastError('Usuario Eliminado');
    }
}
