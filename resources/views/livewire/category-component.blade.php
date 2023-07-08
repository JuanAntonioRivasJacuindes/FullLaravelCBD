<div x-data="{ open: @entangle('modalOpen') }" class="p-4">
    <!-- Botón para abrir el modal -->
    <button @click="open = true" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
        {{ isset($category_id) ? 'Editar Categoría' : 'Crear Categoría' }}
    </button>

    <!-- Modal -->
    <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white shadow-md rounded p-4 max-w-sm mx-auto">
            <h2 class="text-lg font-bold mb-4">{{ isset($category_id) ? 'Editar Categoría' : 'Crear Categoría' }}</h2>
            <form wire:submit.prevent="{{ isset($category_id) ? 'update' : 'create' }}">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                    <input type="text" class="form-input w-full" wire:model="name" id="name">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                    <textarea class="form-textarea w-full" wire:model="description" id="description"></textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">
                        {{ isset($category_id) ? 'Actualizar' : 'Crear' }}
                    </button>
                    <button @click="open = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded" type="button">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <hr class="my-4">

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Descripción</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                    <td class="border px-4 py-2">{{ $category->description }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $category->id }})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded mr-2 text-sm">Editar</button>
                        <button wire:click="delete({{ $category->id }})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded text-sm">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
