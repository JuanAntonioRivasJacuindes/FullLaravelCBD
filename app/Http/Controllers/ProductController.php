<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getProductImages($productId)
    {
        $product = Product::findOrFail($productId);
        $images = $product->images;

        return response()->json(['images' => $images], 200);
    }

    public function uploadImage(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        // Validar si se ha enviado una imagen
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Guardar la imagen en el almacenamiento
            $path = $image->store('product_images', 'public');

            // Crear un registro de imagen asociado al producto
            $product->images()->create([
                'name' => $image->getClientOriginalName(),
                'url' => $path
            ]);

            return response()->json(['message' => 'Imagen cargada correctamente'], 200);
        }

        return response()->json(['message' => 'No se ha proporcionado ninguna imagen'], 400);
    }

    public function deleteImage($imageId)
    {
        $image = Image::findOrFail($imageId);

        // Eliminar la imagen del almacenamiento
        Storage::disk('public')->delete($image->url);

        // Eliminar el registro de imagen
        $image->delete();

        return response()->json(['message' => 'Imagen eliminada correctamente'], 200);
    }
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


            'price' => 'required|numeric',

            'product_code' => 'unique:products,product_code',
            'category_id' => 'nullable|exists:categories,id',

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
