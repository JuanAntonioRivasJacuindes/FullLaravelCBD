<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductComponent extends Component
{
    public $name;
    public $slug_url;
    public $stripe_id;
    public $price;
    public $stripe_default_price;

    public $selectedProductId;
    public $isOpen = 0;

    public function render()
    {
        $products = Product::all();
        return view('livewire.product-component', compact('products'));
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->slug_url = '';
        $this->stripe_id = '';
        $this->price = '';
        $this->stripe_default_price = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'slug_url' => 'required',
            'stripe_id' => 'required',
            'price' => 'required',
            'stripe_default_price' => 'required',
        ]);

        Product::create([
            'name' => $this->name,
            'slug_url' => $this->slug_url,
            'stripe_id' => $this->stripe_id,
            'price' => $this->price,
            'stripe_default_price' => $this->stripe_default_price,
        ]);

        session()->flash('message', 'Producto creado exitosamente.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->selectedProductId = $id;
        $this->name = $product->name;
        $this->slug_url = $product->slug_url;
        $this->stripe_id = $product->stripe_id;
        $this->price = $product->price;
        $this->stripe_default_price = $product->stripe_default_price;

        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'slug_url' => 'required',
            'stripe_id' => 'required',
            'price' => 'required',
            'stripe_default_price' => 'required',
        ]);

        $product = Product::findOrFail($this->selectedProductId);
        $product->update([
            'name' => $this->name,
            'slug_url' => $this->slug_url,
            'stripe_id' => $this->stripe_id,
            'price' => $this->price,
            'stripe_default_price' => $this->stripe_default_price,
        ]);

        session()->flash('message', 'Producto actualizado exitosamente.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('message', 'Producto eliminado exitosamente.');
    }
}
