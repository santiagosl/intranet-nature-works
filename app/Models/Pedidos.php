<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    //protected $dateFormat = 'd-m-Y';

    protected $fillable = [   'fecha_creacion', 'referencia' , 'n_albaran' 
                            , 'observaciones' , 'material_comercial', 'transporte'
                            , 'fecha_recogida', 'confirmacion_recogida'
                            , 'status'];

    public function getRouteKeyName(){
        
        return "referencia";
    }

    //Relacion uno a uno polimorfica
    public function pdf(){
        return $this->morphOne(Pdf::class, 'imageable');
    }
}
