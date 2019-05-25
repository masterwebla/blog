<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "servicios";
    protected $fillable = ['nombre','descripcion','precio'];


    //Buscador por nombre del Servicio
    public function scopeNombre($query,$nombre){
    	return $query->where('nombre','LIKE','%'.$nombre.'%');
    }

    //Buscador por precio desde
    public function scopePrecio1($query,$precio1){
    	if($precio1)
    		return $query->where('precio','>=',$precio1);
    }

    //Buscador por precio desde
    public function scopePrecio2($query,$precio2){
    	if($precio2)
    		return $query->where('precio','<=',$precio2);
    }
}
