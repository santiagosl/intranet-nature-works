<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(){

        return view('admin.users.index');
    }

    public function create(){

        $user = User::all();
        return view('admin.users.create', compact('user'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
           
        $password = bcrypt($request->input('password'));
        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => $password,
        ]);

        return redirect()->route('admin.users.index', $user)->with('info', 'El usuario se creó con éxito');

    }

    public function show(string $id)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user' , 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index', $user)->with('info', 'Se asignó los roles correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index', $user)->with('info', 'El usuario se eliminó con éxito');
    }
}