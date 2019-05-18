<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Servicio;
use File;

class ImageController extends Controller
{
    
    public function index($servicio_id)
    {
        $servicio = Servicio::find($servicio_id);
        $images = Image::where('servicio_id',$servicio_id)->get();
        return view('images.index',compact('servicio','images'));
    }

    
    public function store(Request $request)
    {
        //Validar
        $request->validate([
            'servicio_id' => 'required',
            'archivo' => 'mimes:jpeg,bmp,png'
        ]);

        //Subir el archivo a la carpeta imgservicios
        $archivo = $request->file('archivo');
        $ruta = public_path().'/imgservicios';
        $nombreimg = $request->servicio_id."-".uniqid()."-".$archivo->getClientOriginalName();
        $archivo->move($ruta,$nombreimg);

        //Insertar en la tabla
        Image::create([
            'archivo'=>$nombreimg,
            'servicio_id'=>$request->servicio_id
        ]);

        return redirect()->back();

    }

    
    public function destroy($id)
    {
        $image = Image::find($id);

        $ruta = public_path().'/imgservicios/'.$image->archivo;
        File::delete($ruta);

        $image->delete();
        return redirect()->back();
    }
}
