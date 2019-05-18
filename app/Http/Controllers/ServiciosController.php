<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;

class ServiciosController extends Controller
{
    //Listado de Servicios
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index',compact('servicios'));
    }

    //Formulario para crear
    public function create()
    {
        return view('servicios.crear');
    }

    //Guardar Servicio
    public function store(Request $request)
    {
        //Validar
        $request->validate([
            'nombre' => 'required|unique:servicios|max:100',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);

        //Insertar
        Servicio::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio
        ]);

        return redirect()->route('servicios.index');
    }

    
    public function show($id)
    {
        //
    }

    //Formulario para editar
    public function edit($id)
    {
        $servicio = Servicio::find($id);
        return view('servicios.edit',compact('servicio'));
    }

    //Actulaizar
    public function update(Request $request, $id)
    {
        //Validar
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);

        //Actualizar
        $servicio = Servicio::find($id);
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->precio = $request->precio;
        $servicio->save();

        return redirect()->route('servicios.index');

    }

    //Borrar
    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        $servicio->delete();

        return redirect()->route('servicios.index');
        
    }
}
