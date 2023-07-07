<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleComponent extends Component
{
    public $roles;
    public $role;
    public $isOpen = false;
    public $isEditing = false;

    protected $rules = [
        'role.name' => 'required',
    ];

    public function mount()
    {
        $this->resetRole();
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.role-component');
    }

    public function create()
    {
        $this->resetValidation();
        $this->resetRole();
        $this->isOpen = true;
        $this->isEditing = false;
    }

    public function edit($id)
    {
        $this->resetValidation();
        $this->role = Role::findOrFail($id);
        $this->isOpen = true;
        $this->isEditing = true;
    }

    public function store()
    {
        $this->validate();

        Role::create([
            'name' => $this->role['name'],
        ]);

        session()->flash('message', 'Rol creado exitosamente.');

        $this->closeModal();
        $this->roles = Role::all();
    }

    public function update()
    {
        $this->validate();

        $this->role->save();

        session()->flash('message', 'Rol actualizado exitosamente.');

        $this->closeModal();
        $this->roles = Role::all();
    }

    public function delete($id)
    {
        Role::findOrFail($id)->delete();
        session()->flash('message', 'Rol eliminado exitosamente.');
        $this->roles = Role::all();
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->isEditing = false;
        $this->resetValidation();
        $this->resetRole();
    }

    private function resetRole()
    {
        $this->role = [
            'name' => null,
        ];
    }
}
