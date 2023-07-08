<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductComponent extends Component
{
    public $name;
    public $slug_url;
    public $description;
    public $price;
    public $stock;
    public $product_code;
    public $category_id;
    public $status;

    public function render()
    {
        $products = Product::all();

        return view('livewire.product-component', compact('products'));
    }

    public function generateSlug($value)
    {
        $this->slug_url = Str::slug($value, '-');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'product_code' => 'required',

            'status' => 'required',
        ]);

        $data = [
            'name' => $this->name,
            'slug_url' => $this->slug_url,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'product_code' => $this->product_code,
            'status' => $this->status,
        ];

        if (!empty($this->category_id)) {
            $data['category_id'] = $this->category_id;
        }

        Product::create($data);

        $this->resetFields();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->slug_url = '';
        $this->description = '';
        $this->price = '';
        $this->stock = '';
        $this->product_code = '';
        $this->category_id = '';
        $this->status = '';
    }
}
