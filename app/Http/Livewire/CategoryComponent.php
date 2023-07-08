<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryComponent extends Component
{
    public $name;
    public $description;
    public $category_id;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.category-component', compact('categories'));
    }

    public function create()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = Category::find($this->category_id);
        $category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->resetInputFields();
    }

    public function delete($id)
    {
        Category::find($id)->delete();
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
    }
}
