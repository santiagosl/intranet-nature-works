<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use App\Models\Pedidos;

class PedidosController extends Controller
{
    public function index(){

        $pedidos = Pedidos::where('status' , 'Listo')->latest('created_at')->paginate(10);
        
        return view('pedidos.index' , compact('pedidos'));
    }

    public function show(Pedidos $pedido){
       $pdf = Pdf::where('imageable_id' , $pedido->id)->get();
       //dd($pdf);
       return view('pedidos.show' , compact('pedido', 'pdf'));
    }
}
