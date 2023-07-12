<?php
namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function deleteImage($imageId)
    {
        $image = Image::findOrFail($imageId);
    
        // Eliminar la imagen del almacenamiento
        Storage::disk('public')->delete($image->url);
    
        // Eliminar el registro de imagen
        $image->delete();
    
        return response()->json(['message' => 'Imagen eliminada correctamente'], 200);
    }
}
