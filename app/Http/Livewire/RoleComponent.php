<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleComponent extends Component
{
    public $name;
    public $roles;

    public function render()
    {
        $this->roles = Role::all();

        return view('livewire.role-component');
    }

    public function create()
    {
        Role::create([
            'name' => $this->name,
        ]);

        $this->name = '';

        $this->emit('roleCreated');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $this->name = $role->name;
    }

    public function update($id)
    {
        $role = Role::find($id);
        $role->update([
            'name' => $this->name,
        ]);

        $this->name = '';

        $this->emit('roleUpdated');
    }

    public function delete($id)
    {
        Role::find($id)->delete();

        $this->emit('roleDeleted');
    }
}
