<!-- livewire/role-component.blade.php -->

<div>
    <!-- Formulario para crear o editar un rol -->
    <form wire:submit.prevent="create">
        <div class="form-group">
            <label for="name">Nombre del Rol:</label>
            <input type="text" class="form-control" wire:model="name">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>

    <!-- Tabla para mostrar los roles existentes -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <button wire:click="edit({{ $role->id }})" class="btn btn-sm btn-primary">Editar</button>
                        <button wire:click="delete({{ $role->id }})" class="btn btn-sm btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>