<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');
        $nombreImagen = Str::uuid() .".". $imagen->extension();
        $ImagenServidor = Image::make($imagen);
        $ImagenServidor->fit(500,500);
        $ImagenRuta = public_path('uploads'). '/'. $nombreImagen;
        $ImagenServidor->save($ImagenRuta);
        return response()->json(['imagen'=>$nombreImagen]);
    }
}
