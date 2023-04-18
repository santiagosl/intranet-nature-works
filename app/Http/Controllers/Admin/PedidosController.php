<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Storage;
use App\Models\Pdf;
use Livewire\WithPagination;
use App\Http\Requests\PedidosRequest;

class PedidosController extends Controller
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$pedidos = Pedidos::all();
        //$users = User::where('name', 'LIKE' , '%' . $this->word . '%')->orWhere('email', 'LIKE' , '%' . $this->word . '%')->paginate();

        $pedidos = Pedidos::where('status' , '<>' , null)->latest('created_at')->paginate(10);
        return view('admin.pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pedidos.create');
    }

    public function store(PedidosRequest $request)
    {

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
       
        return redirect()->route('admin.pedidos.index', $pedido)->with('info', 'El pedido se creó con éxito');
 
    }

    public function show(Pedidos $pedido)
    {
        return view('admin.pedidos.show', compact('pedido'));
    }

    public function edit(Pedidos $pedido)
    {
        return view('admin.pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, Pedidos $pedido)
    {
        $request->validate([
            'fecha_creacion' => 'required',
            'referencia' => 'required',
            'n_albaran' => 'required'
        ]);

        $pedido->update($request->all());

                
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

        return redirect()->route('admin.pedidos.index', $pedido)->with('info', 'El pedido se actualizó con éxito');
        //return $request;
        //dd($request);
    }

    public function destroy(Pedidos $pedido)
    {
        $pedido->delete();
        $pdf = Pdf::where('imageable_id' , $pedido->id);
        $pdf->delete();
        return redirect()->route('admin.pedidos.index', $pedido)->with('info', 'El pedido se eliminó con éxito');
    }
}
