<ul class="space-y-2 font-medium">
    <li>
        <x-responsive-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
    </li>
    <li>
        <x-responsive-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
            Usuarios
        </x-responsive-nav-link>
    </li>
    <li>
        <x-responsive-nav-link href="{{ route('roles.index') }}" :active="request()->routeIs('roles.index')">
            Roles y permisos
        </x-responsive-nav-link>
    </li>
    <li>
        <x-responsive-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.index')">
            Productos
        </x-responsive-nav-link>
    </li>

</ul>