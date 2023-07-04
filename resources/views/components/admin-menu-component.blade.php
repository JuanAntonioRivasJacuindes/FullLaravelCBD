<ul class="space-y-2 font-medium">
    <li>
        <x-responsive-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
    </li>
    <li>
        <x-responsive-nav-link href="{{ route('admin.users') }}" :active="request()->routeIs('admin.users')">
            Usuarios
        </x-responsive-nav-link>
    </li>
    <li>
        <x-responsive-nav-link href="{{ route('admin.roles') }}" :active="request()->routeIs('admin.roles')">
            Roles y permisos
        </x-responsive-nav-link>
    </li>

</ul>