<div>
    <form wire:submit.prevent="store">
        <div>
            <label for="name">Name:</label>
            <input type="text" wire:model="name" id="name">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea wire:model="description" id="description"></textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" wire:model="price" id="price">
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="text" wire:model="stock" id="stock">
        </div>
        <div>
            <label for="product_code">Product Code:</label>
            <input type="text" wire:model="product_code" id="product_code">
        </div>
        <div>
            <label for="category_id">Category:</label>
            <select wire:model="category_id" id="category_id">
                <!-- Add options for categories -->
            </select>
        </div>
        <div>
            <label for="status">Status:</label>
            <input type="text" wire:model="status" id="status">
        </div>
       <button type="submit" wire:click="store">Save Product</button>

    </form>

    <hr>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Product Code</th>
                <th>Category</th>
                <th>Status</th>
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
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
