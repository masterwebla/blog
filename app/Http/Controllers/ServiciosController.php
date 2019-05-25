<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Servicio;
use App;
use View;

class ServiciosController extends Controller
{
    //Listado de Servicios
    public function index(Request $request)
    {
        $servicios = Servicio::nombre($request->nombre)
                    ->precio1($request->precio1)
                    ->precio2($request->precio2)->paginate(10);
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

    //Función para exportar en PDF
    public function exportarPDF(){
        $servicios = Servicio::all();
        $pdf = App::make('dompdf.wrapper');
        $vista = View::make('servicios.pdf',compact('servicios'))->render();
        $pdf->loadHTML($vista);
        return $pdf->download('servicios');
    }

    //Función para exportar en Excel
    public function exportarExcel(){
        Excel::create('servicios',function($excel){
            $excel->sheet('servicios',function($sheet){
                $servicios = Servicio::select('nombre','descripcion','precio')->get();
                $sheet->fromArray($servicios);
            });
        })->export('xlsx');
    }

    //Función para importar en Excel
    public function importarExcel(Request $request){
        //Validar tipo de archivo
        /*
        $request->validate([
            'archivo'=>'required|mimes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ]);
        */

        //Subir el archivo a la carpeta publica
        $archivo = $request->file('archivo');
        
        //Importación
        Excel::load($archivo,function($reader){
            foreach($reader->get() as $servicio){
                Servicio::create([
                    'nombre'=>$servicio->nombre,
                    'descripcion'=>$servicio->descripcion,
                    'precio'=>$servicio->precio
                ]);
            }
        });

        return redirect()->route('servicios.index');
    }
}