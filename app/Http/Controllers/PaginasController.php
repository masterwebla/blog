<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function nosotros(){
    	$nombre = "Mauricio";
    	$edad = 24;
    	return view('nosotros',compact('nombre','edad'));
    }

    public function productos(){
    	return view('productos');
    }
}
