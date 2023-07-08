<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\User;

class AddressManager extends Component
{
    public $showAddAddressModal = false;
    public $showEditAddressModal = false;
    public $newAddress = [
        'full_name' => '',
        'address' => '',
        'country' => '',
        'phone' => '',
        'is_default' => false,
    ];
    public $editingAddress = null;
    public $editedAddress = [
        'full_name' => '',
        'address' => '',
        'country' => '',
        'phone' => '',
        'is_default' => false,
    ];

    public function render()
    {
        $user = Auth::user();
        $addresses = $user->addresses;

        return view('livewire.address-manager', compact('addresses'));
    }

    public function createAddress()
    {
        $this->validate([
            'newAddress.full_name' => 'required',
            'newAddress.address' => 'required',
            'newAddress.country' => 'required',
            'newAddress.phone' => 'required',
            // Agrega más reglas de validación según tus necesidades
        ]);

        $user = User::find(Auth::user()->id);
        $user->addresses()->create($this->newAddress);

        $this->resetForm();
    }

    public function editAddress($id)
    {
        $this->editingAddress = Address::find($id);
        $this->editedAddress = $this->editingAddress->toArray();
        $this->showEditAddressModal = true;
    }

    public function updateAddress()
    {
        $this->validate([
            'editedAddress.full_name' => 'required',
            'editedAddress.address' => 'required',
            'editedAddress.country' => 'required',
            'editedAddress.phone' => 'required',
            // Agrega más reglas de validación según tus necesidades
        ]);

        $this->editingAddress->update($this->editedAddress);

        $this->resetForm();
    }

    public function deleteAddress($id)
    {
        $address = Address::find($id);
        $address->delete();
    }

    private function resetForm()
    {
        $this->showAddAddressModal = false;
        $this->showEditAddressModal = false;
        $this->newAddress = [
            'full_name' => '',
            'address' => '',
            'country' => '',
            'phone' => '',
            'is_default' => false,
        ];
        $this->editingAddress = null;
        $this->editedAddress = [
            'full_name' => '',
            'address' => '',
            'country' => '',
            'phone' => '',
            'is_default' => false,
        ];
    }
}
