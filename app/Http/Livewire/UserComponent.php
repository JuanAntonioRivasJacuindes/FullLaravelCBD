<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserComponent extends Component
{
    public $users;
    public $user;
    public $isOpen = false;
    public $isEditing = false;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'user.password' => 'required|min:6',
    ];

    public function mount()
    {
        $this->resetUser();
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.user-component');
    }

    public function create()
    {
        $this->resetValidation();
        $this->resetUser();
        $this->isOpen = true;
        $this->isEditing = false;
    }

    public function edit($id)
    {
        $this->resetValidation();
        $this->user = User::findOrFail($id);
        $this->isOpen = true;
        $this->isEditing = true;
    }

    public function store()
    {
        $this->validate();

        User::create([
            'name' => $this->user['name'],
            'email' => $this->user['email'],
            'password' => Hash::make($this->user['password']),
        ]);

        session()->flash('message', 'Usuario creado exitosamente.');

        $this->closeModal();
        $this->users = User::all();
    }

    public function update()
    {
        $this->validate();

        $this->user->save();

        session()->flash('message', 'Usuario actualizado exitosamente.');

        $this->closeModal();
        $this->users = User::all();
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'Usuario eliminado exitosamente.');
        $this->users = User::all();
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->isEditing = false;
        $this->resetValidation();
        $this->resetUser();
    }

    private function resetUser()
    {
        $this->user = [
            'name' => null,
            'email' => null,
            'password' => null,
        ];
    }
}
