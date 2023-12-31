<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function revokePermissions(Request $request, Role $role)
    {
       
        if (!$role) {
            return response()->json(['message' => 'Rol no encontrado'], 404);
        }

        $permissionIds = $request->input('permissions', []);

        $permissions = Permission::whereIn('name', $permissionIds)->get();

        foreach ($permissions as $permission) {
            $role->revokePermissionTo($permission);
        }

        return response()->json(['message' => 'Permisos revocados correctamente'], 200);
    }
    public function assignPermissions(Request $request, Role $role)
    {
        $permissions = $request->input('permissions');

        $role->syncPermissions($permissions);

        return response()->json(['message' => 'Permisos asignados al rol correctamente'], 200);
    }
    function getPermissions(Role $role)
    {

        $permissions = $role->permissions;
        return response()->json(['permissions' => $permissions], 200);
    }
    public function index()
    {
        // Obtener todos los roles
        $roles = Role::all();

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json($roles, 200);
        } else {
            return view('admin.roles.index', compact('roles'));
        }
    }

    public function create()
    {
        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Create form'], 200);
        } else {
            return view('roles.create');
        }
    }

    public function store(Request $request)
    {
        // Validación de los campos requeridos
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        // Crear un nuevo rol con el nombre proporcionado
        $role = Role::create($validatedData);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Rol creado exitosamente', 'role' => $role], 201);
        } else {
            return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente');
        }
    }

    public function show($id)
    {
        // Obtener el rol por su ID
        $role = Role::findOrFail($id);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json($role, 200);
        } else {
            return view('roles.show', compact('role'));
        }
    }

    public function edit($id)
    {
        // Obtener el rol por su ID
        $role = Role::findOrFail($id);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Edit form'], 200);
        } else {
            return view('roles.edit', compact('role'));
        }
    }

    public function update(Request $request, $id)
    {
        // Obtener el rol por su ID
        $role = Role::findOrFail($id);

        // Validación de los campos requeridos
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        // Actualizar el nombre del rol
        $role->update($validatedData);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Rol actualizado exitosamente'], 200);
        } else {
            return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente');
        }
    }

    public function destroy($id)
    {
        // Obtener el rol por su ID
        $role = Role::findOrFail($id);

        // Eliminar el rol
        $role->delete();

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Rol eliminado exitosamente'], 200);
        } else {
            return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente');
        }
    }
}
