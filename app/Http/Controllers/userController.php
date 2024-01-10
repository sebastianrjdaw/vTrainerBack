<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserLog;
class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        //return view('users.index', compact('users'));
        return view('admin.users.index', ['usuarios' => $users]);
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        UserLog::create([
            'user_id' => '0',
            'action' => 'Se ha registrado al usuario ('.$user->name.' id: '.$user->id.' ) desde el panel de administracion',
            'importance_level' => 1
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', ['usuario' => $user]);
    }


    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->save();

        UserLog::create([
            'user_id' => '0',
            'action' => 'Se ha editado el usuario ('.$user->name.' | id: '.$user->id.' ) desde el panel de administracion',
            'importance_level' => 2
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }




    public function destroy(User $user)
    {
        $user->delete();
        UserLog::create([
            'user_id' => '0',
            'action' => 'Se ha eliminado el usuario ('.$user->name.' | id: '.$user->id.' ) desde el panel de administracion',
            'importance_level' => 1
        ]);
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
