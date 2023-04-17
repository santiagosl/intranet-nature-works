<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Storage;
use App\Models\Pdf;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedidos::all();
        //$pedidos = Pedidos::where('status' , '0')->latest('created_at')->paginate(10);
        return view('admin.pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_creacion' => 'required',
            'referencia' => 'required',
            'n_albaran' => 'required'
        ]);

        $pedido = Pedidos::create($request->all());
        
        if($request->file('pdf_1')){
            $url = Storage::put('pdf' , $request->file('pdf_1'));
            $pedido->pdf()->create([
                'url' => $url
            ]);
        }
        if($request->file('pdf_2')){
            $url = Storage::put('pdf' , $request->file('pdf_2'));
            $pedido->pdf()->create([
                'url' => $url
            ]);
        }
       
        return redirect()->route('admin.pedidos.edit', $pedido)->with('info', 'El pedido se creó con éxito');
 
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedidos $pedido)
    {
        return view('admin.pedidos.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedidos $pedido)
    {
        return view('admin.pedidos.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedidos $pedido)
    {
        $request->validate([
            'fecha_creacion' => 'required',
            'referencia' => 'required',
            'n_albaran' => 'required'
        ]);

        $pedido->update($request->all());
        return redirect()->route('admin.pedidos.edit', $pedido)->with('info', 'El pedido se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedidos $pedido)
    {
        $pedido->delete();

         //$pedidos = Pedidos::where('status' , '0')->latest('created_at')->paginate(10);


        return redirect()->route('admin.pedidos.index', $pedido)->with('info', 'El pedido se eliminó con éxito');
    }
}
