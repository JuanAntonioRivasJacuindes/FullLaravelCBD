<x-guest-layout>
<div>
    <h1>Listado de Productos</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Código de Producto</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->category->name ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</x-guest-layout>