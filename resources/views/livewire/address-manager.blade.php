<x-action-section>
    <x-slot name="title">
        {{ __('Direcciones de usuario') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Organice y mantenga actualizada su lista de direcciones de envío') }}
    </x-slot>

    <x-slot name="content">
    <div class="w-full"> 
    <!-- Botón para agregar dirección -->
    <x-button wire:click="$toggle('showAddAddressModal')">Agregar Dirección</x-button>

    <!-- Modal para agregar dirección -->
    <x-dialog-modal wire:model.defer="showAddAddressModal">
        <x-slot name="title">
            Agregar Dirección
        </x-slot>

        <x-slot name="content">
            <!-- Formulario para agregar dirección -->
            <form wire:submit.prevent="createAddress">
                <!-- Campos de formulario -->
                <div>
                    <x-label for="full_name">Nombre completo</x-label>
                    <x-input type="text" wire:model.defer="newAddress.full_name" id="full_name" />
                    <x-input-error for="newAddress.full_name" class="mt-2" />
                </div>

                <div>
                    <x-label for="address">Dirección</x-label>
                    <x-input type="text" wire:model.defer="newAddress.address" id="address" />
                    <x-input-error for="newAddress.address" class="mt-2" />
                </div>

                <div>
                    <x-label for="country">País</x-label>
                    <x-input type="text" wire:model.defer="newAddress.country" id="country" />
                    <x-input-error for="newAddress.country" class="mt-2" />
                </div>

                <div>
                    <x-label for="phone">Teléfono</x-label>
                    <x-input type="text" wire:model.defer="newAddress.phone" id="phone" />
                    <x-input-error for="newAddress.phone" class="mt-2" />
                </div>

                <div>
                    <x-label for="is_default">Es predeterminada</x-label>
                    <x-checkbox wire:model.defer="newAddress.is_default" id="is_default" />
                    <x-input-error for="newAddress.is_default" class="mt-2" />
                </div>

                <!-- Botón para enviar el formulario -->
                <x-button>Guardar</x-button>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showAddAddressModal')">Cancelar</x-secondary-button>
        </x-slot>
    </x-dialog-modal>

    <!-- Lista de direcciones -->
    <div class="bg-white rounded-lg shadow-md p-4">
    <h3 class="text-lg font-semibold mb-4">Lista de direcciones</h3>
    <ul>
        @foreach ($addresses as $address)
            <li class="flex items-center justify-between py-2">
                <div>
                    <p class="text-gray-800">{{ $address->full_name }}</p>
                    <p class="text-gray-600">{{ $address->address }}</p>
                    <p class="text-gray-600">{{ $address->country }}</p>
                    <p class="text-gray-600">{{ $address->phone }}</p>
                </div>
                @if ($address->is_default)
                    <span class="text-green-500 ml-2">(Predeterminada)</span>
                @endif
                <div class="flex">
                    <button class="text-blue-500 hover:text-blue-700 focus:outline-none focus:text-blue-700 mr-2"
                        wire:click="editAddress({{ $address->id }})">
                        Editar
                    </button>
                    <button class="text-red-500 hover:text-red-700 focus:outline-none focus:text-red-700"
                        wire:click="deleteAddress({{ $address->id }})">
                        Eliminar
                    </button>
                </div>
            </li>
        @endforeach
    </ul>
</div>

    <!-- Modal para editar dirección -->
    @if ($editingAddress)
        <x-dialog-modal wire:model.defer="showEditAddressModal">
            <x-slot name="title">
                Editar Dirección
            </x-slot>

            <x-slot name="content">
                <!-- Formulario para editar dirección -->
                <form wire:submit.prevent="updateAddress">
                    <!-- Campos de formulario -->
                    <div>
                        <x-label for="editFullName">Nombre completo</x-label>
                        <x-input type="text" wire:model.defer="editedAddress.full_name" id="editFullName" />
                        <x-input-error for="editedAddress.full_name" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="editAddress">Dirección</x-label>
                        <x-input type="text" wire:model.defer="editedAddress.address" id="editAddress" />
                        <x-input-error for="editedAddress.address" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="editCountry">País</x-label>
                        <x-input type="text" wire:model.defer="editedAddress.country" id="editCountry" />
                        <x-input-error for="editedAddress.country" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="editPhone">Teléfono</x-label>
                        <x-input type="text" wire:model.defer="editedAddress.phone" id="editPhone" />
                        <x-input-error for="editedAddress.phone" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="editIsDefault">Es predeterminada</x-label>
                        <x-checkbox wire:model.defer="editedAddress.is_default" id="editIsDefault" />
                        <x-input-error for="editedAddress.is_default" class="mt-2" />
                    </div>

                    <!-- Botón para enviar el formulario -->
                    <x-button>Guardar</x-button>
                </form>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('showEditAddressModal')">Cancelar</x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    @endif
</div>

    </x-slot>
</x-action-section>
