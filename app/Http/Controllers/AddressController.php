<?php
namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        // Obtener todas las direcciones del usuario autenticado
        $addresses = auth()->user()->addresses;

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json($addresses, 200);
        } else {
            return view('addresses.index', compact('addresses'));
        }
    }

    public function create()
    {
        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Create form'], 200);
        } else {
            return view('addresses.create');
        }
    }

    public function store(Request $request)
    {
        // Validación de los campos requeridos
        $validatedData = $request->validate([
            'full_name' => 'required',
            'address' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'is_default' => 'boolean',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        // Crear una nueva dirección para el usuario autenticado
        $address = $user->addresses()->create($validatedData);
        // Establecer la dirección como predeterminada si se marca como tal
        if ($validatedData['is_default']) {
            $user->setDefaultAddress($address->id);
        }

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Dirección creada exitosamente'], 201);
        } else {
            return redirect()->route('addresses.index')->with('success', 'Dirección creada exitosamente');
        }
    }

    public function show($id)
    {
        // Obtener la dirección por su ID
        $address = Address::findOrFail($id);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json($address, 200);
        } else {
            return view('addresses.show', compact('address'));
        }
    }

    public function edit($id)
    {
        // Obtener la dirección por su ID
        $address = Address::findOrFail($id);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Edit form'], 200);
        } else {
            return view('addresses.edit', compact('address'));
        }
    }

    public function update(Request $request, $id)
    {
        // Obtener la dirección por su ID
        $address = Address::findOrFail($id);
        $user = User::findOrFail(auth()->user()->id);
        // Validación de los campos requeridos
        $validatedData = $request->validate([
            'full_name' => 'required',
            'address' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'is_default' => 'boolean',
        ]);

        // Actualizar los datos de la dirección
        $address->update($validatedData);

        // Establecer la dirección como predeterminada si se marca como tal
        if ($validatedData['is_default']) {
            $user->setDefaultAddress($address->id);
        }

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Dirección actualizada exitosamente'], 200);
        } else {
            return redirect()->route('addresses.index')->with('success', 'Dirección actualizada exitosamente');
        }
    }

    public function destroy($id)
    {
        // Obtener la dirección por su ID
        $address = Address::findOrFail($id);

        // Eliminar la dirección
        $address->delete();

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Dirección eliminada exitosamente'], 200);
        } else {
            return redirect()->route('addresses.index')->with('success', 'Dirección eliminada exitosamente');
        }
    }
}
