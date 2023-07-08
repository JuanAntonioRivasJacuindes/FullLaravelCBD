<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios
        $users = User::all();

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json($users, 200);
        } else {
            return view('admin.users.index', compact('users'));
        }
    }

    public function create()
    {
        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Create form'], 200);
        } else {
            return view('users.create');
        }
    }

    public function store(Request $request)
    {
        // Validación de los campos requeridos
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Crear un nuevo usuario con los datos validados
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json($user, 201);
        } else {
            return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
        }
    }

    public function show($id)
    {
        // Obtener el usuario por su ID
        $user = User::findOrFail($id);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json($user, 200);
        } else {
            return view('users.show', compact('user'));
        }
    }

    public function edit($id)
    {
        // Obtener el usuario por su ID
        $user = User::findOrFail($id);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Edit form'], 200);
        } else {
            return view('users.edit', compact('user'));
        }
    }

    public function update(Request $request, $id)
    {
        // Obtener el usuario por su ID
        $user = User::findOrFail($id);

        // Validación de los campos requeridos
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        // Actualizar los datos del usuario con los datos validados
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if ($validatedData['password']) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->save();

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Usuario actualizado exitosamente'], 200);
        } else {
            return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente');
        }
    }

    public function destroy($id)
    {
        // Obtener el usuario por su ID
        $user = User::findOrFail($id);

        // Eliminar el usuario
        $user->delete();

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Usuario eliminado exitosamente'], 200);
        } else {
            return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente');
        }
    }
}
