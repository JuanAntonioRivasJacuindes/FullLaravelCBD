<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();

        return view('addresses.index', compact('addresses'));
    }

    public function create()
    {
        return view('addresses.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user(); // Obtener el usuario autenticado
    
        $address = new Address($request->all());
        $address->user_id = $user->id; // Asociar el ID del usuario a la dirección
        $address->save();
    
        return redirect()->route('addresses.index')
            ->with('success', 'Dirección creada exitosamente.');
    }

    public function edit(Address $address)
    {
        return view('addresses.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $address->update($request->all());

        return redirect()->route('addresses.index')
            ->with('success', 'Dirección actualizada exitosamente.');
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->route('addresses.index')
            ->with('success', 'Dirección eliminada exitosamente.');
    }
}
