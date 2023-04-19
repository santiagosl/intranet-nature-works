<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use App\Models\Pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index(){

        $pedidos = Pedidos::where('status' , 'Listo')->latest('created_at')->paginate(10);
        return view('pedidos.index' , compact('pedidos'));
    }

    public function show(Pedidos $pedido){
       $pdf = Pdf::where('imageable_id' , $pedido->id)->get();
       return view('pedidos.show' , compact('pedido', 'pdf'));
    }

    public function update(Request $request, Pedidos $pedido){
       
        $pedido->update($request->all());
        return redirect()->route('pedidos.index', $pedido)->with('info', 'El pedido se actualizó con éxito');
        //dd($request);
     }
}
