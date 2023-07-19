<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Compras') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        



        @if ($orders->isEmpty())
        <div class="flex flex-col items-center justify-center h-screen">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
            <p class="text-center m-4">No se encontraron ordenes.</p>
        </div>


        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($orders as $order)
            <div class="bg-white shadow-md p-4">
                <h2 class="text-lg font-semibold mb-2">Orden: {{ $order->order_id }}</h2>
                <p class="mb-1">Monto: {{ $order->amount }}</p>
                <p class="mb-1">Estado: {{ $order->status }}</p>
                <p class="text-sm text-gray-500">Fecha: {{ $order->created_at->format('d/m/Y') }}</p>
            </div>
            @endforeach
        </div>
        @endif 
    </div>
</x-app-layout>