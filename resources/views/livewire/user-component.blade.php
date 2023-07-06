<!-- livewire/user-component.blade.php -->

<div>
    <!-- Formulario para crear o editar un usuario -->
    <form wire:submit.prevent="create">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" wire:model="name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" wire:model="email">
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" wire:model="password">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>

    <!-- Tabla para mostrar los usuarios existentes -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-primary">Editar</button>
                        <button wire:click="delete({{ $user->id }})" class="btn btn-sm btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
