<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Obtener todas las categorías
        $categories = Category::all();

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json($categories, 200);
        } else {
            return view('admin.categories.index', compact('categories'));
        }
    }

    public function create()
    {
        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Create form'], 200);
        } else {
            return view('categories.create');
        }
    }

    public function store(Request $request)
    {
        // Validación: Solo se permite el nombre como campo requerido
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        // Crear una nueva categoría solo con el nombre
        $category = Category::create($validatedData);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Categoría creada exitosamente'], 201);
        } else {
            return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente');
        }
    }

    public function show($id)
    {
        // Obtener la categoría por su ID
        $category = Category::findOrFail($id);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json($category, 200);
        } else {
            return view('categories.show', compact('category'));
        }
    }

    public function edit($id)
    {
        // Obtener la categoría por su ID
        $category = Category::findOrFail($id);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Edit form'], 200);
        } else {
            return view('categories.edit', compact('category'));
        }
    }

    public function update(Request $request, $id)
    {
        // Obtener la categoría por su ID
        $category = Category::findOrFail($id);

        // Validación: Solo se permite el nombre como campo requerido
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        // Actualizar solo el nombre de la categoría
        $category->update(['name' => $validatedData['name']]);

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Categoría actualizada exitosamente'], 200);
        } else {
            return redirect()->route('categories.index')->with('success', 'Categoría actualizada exitosamente');
        }
    }

    public function destroy($id)
    {
        // Obtener la categoría por su ID
        $category = Category::findOrFail($id);

        // Verificar si la categoría tiene asociaciones con productos
        if ($category->products()->count() > 0) {
            // La categoría tiene asociaciones con productos, mostrar un mensaje de error
            return redirect()->back()->with('error', 'No se puede eliminar la categoría porque tiene productos asociados');
        }

        // Eliminar la categoría si no tiene asociaciones con productos
        $category->delete();

        // Retornar vista o respuesta JSON en función del tipo de solicitud
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Categoría eliminada exitosamente'], 200);
        } else {
            return redirect()->route('categories.index')->with('success', 'Categoría eliminada exitosamente');
        }
    }
}
