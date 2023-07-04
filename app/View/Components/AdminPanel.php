<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Laravel\Jetstream\ConfirmsPasswords;

class AdminPanel extends Component
{
    use ConfirmsPasswords;

    public function render()
    {
        return view('components.admin-panel');
    }
}