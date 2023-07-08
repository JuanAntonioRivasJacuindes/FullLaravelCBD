<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Obtener todos los productos
        $products = Product::all();

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json($products, 200);
        } else {
            return view('admin.products.index', compact('products'));
        }
    }

    public function create()
    {
        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Create form'], 200);
        } else {
            return view('products.create');
        }
    }

    public function store(Request $request)
    {
        // Validación de los campos requeridos
        $validatedData = $request->validate([
            'name' => 'required',
            'slug_url' => 'required|unique:products,slug_url',

            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'product_code' => 'unique:products,product_code',
            'category_id' => 'exists:categories,id',

            'weight' => 'numeric',
            'length' => 'numeric',
            'width' => 'numeric',
            'height' => 'numeric',
        ]);

        // Crear un nuevo producto con los datos validados
        $product = Product::create($validatedData);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Producto creado exitosamente', 'product' => $product], 201);
        } else {
            return redirect()->route('products.index')->with('success', 'Producto creado exitosamente');
        }
    }

    public function show($slug)
    {
        // Obtener el producto por su ID
        $product = Product::where('slug_url', $slug)->first();

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json($product, 200);
        } else {
            return view('products.show', compact('product'));
        }
    }

    public function edit($id)
    {
        // Obtener el producto por su ID
        $product = Product::findOrFail($id);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Edit form'], 200);
        } else {
            return view('products.edit', compact('product'));
        }
    }

    public function update(Request $request, $id)
    {
        // Obtener el producto por su ID
        $product = Product::findOrFail($id);

        // Validación de los campos requeridos
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'integer',
            'product_code' => 'unique:products,product_code,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'status' => 'required',
            'weight' => 'numeric',
            'length' => 'numeric',
            'width' => 'numeric',
            'height' => 'numeric',
        ]);

        // Actualizar los datos del producto con los datos validados
        $product->update($validatedData);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Producto actualizado exitosamente'], 200);
        } else {
            return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente');
        }
    }

    public function destroy($id)
    {
        // Obtener el producto por su ID
        $product = Product::findOrFail($id);

        // Eliminar el producto
        $product->delete();

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Producto eliminado exitosamente'], 200);
        } else {
            return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente');
        }
    }
}
