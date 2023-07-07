<div>
    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <button wire:click="create" class="btn btn-success">Crear Producto</button>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Slug URL</th>
                <th>Stripe ID</th>
                <th>Precio</th>
                <th>Stripe Default Price</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->slug_url }}</td>
                    <td>{{ $product->stripe_id }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stripe_default_price }}</td>
                    <td>
                        <button wire:click="edit({{ $product->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="delete({{ $product->id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="crudModal" tabindex="-1" role="dialog" aria-labelledby="crudModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crudModalLabel">
                        @if($selectedProductId)
                            Editar Producto
                        @else
                            Crear Producto
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" wire:model="name" class="form-control" id="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug_url">Slug URL</label>
                            <input type="text" wire:model="slug_url" class="form-control" id="slug_url">
                            @error('slug_url') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="stripe_id">Stripe ID</label>
                            <input type="text" wire:model="stripe_id" class="form-control" id="stripe_id">
                            @error('stripe_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Precio</label>
                            <input type="text" wire:model="price" class="form-control" id
                            ="price">
                            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="stripe_default_price">Stripe Default Price</label>
                            <input type="text" wire:model="stripe_default_price" class="form-control" id="stripe_default_price">
                            @error('stripe_default_price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    @if($selectedProductId)
                        <button wire:click="update" class="btn btn-primary">Actualizar</button>
                    @else
                        <button wire:click="store" class="btn btn-primary">Crear</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('showModal', () => {
                $('#crudModal').modal('show');
            });

            Livewire.on('hideModal', () => {
                $('#crudModal').modal('hide');
            });
        });
    </script>
</div>
