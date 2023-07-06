<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserComponent extends Component
{
    public $name;
    public $email;
    public $password;
    public $users;

    public function render()
    {
        $this->users = User::all();

        return view('livewire.user-component');
    }

    public function create()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->resetInputFields();

        $this->emit('userCreated');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update($id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->resetInputFields();

        $this->emit('userUpdated');
    }

    public function delete($id)
    {
        User::find($id)->delete();

        $this->emit('userDeleted');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
}
