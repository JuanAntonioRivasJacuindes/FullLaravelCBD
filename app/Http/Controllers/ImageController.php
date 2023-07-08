<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function create(Product $product)
    {
        return view('images.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();

            // Guardar la imagen en el almacenamiento
            $path = $image->storeAs('public/images', $imageName);

            // Crear una nueva entrada de imagen en la base de datos
            $imageModel = $product->images()->create([
                'url' => Storage::url($path),
                'name' => $imageName,
            ]);

            if ($request->wantsJson()) {
                return response()->json($imageModel, 201);
            }

            return redirect()->route('products.show', $product->id)->with('success', 'Imagen subida exitosamente.');
        }

        if ($request->wantsJson()) {
            return response()->json(['error' => 'Error al subir la imagen.'], 400);
        }

        return redirect()->back()->with('error', 'Error al subir la imagen.');
    }

    public function destroy(Product $product, $imageId)
    {
        $image = $product->images()->findOrFail($imageId);

        // Eliminar la imagen del almacenamiento
        Storage::delete('public/images/' . $image->name);

        // Eliminar la entrada de imagen de la base de datos
        $image->delete();

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Imagen eliminada exitosamente.'], 200);
        }

        return redirect()->route('products.show', $product->id)->with('success', 'Imagen eliminada exitosamente.');
    }
}
