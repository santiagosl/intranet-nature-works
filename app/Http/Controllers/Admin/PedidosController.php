<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Storage;
use App\Models\Pdf;
use Livewire\WithPagination;
use App\Http\Requests\PedidosRequest;

class PedidosController extends Controller{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function index(){
        $pedidos = Pedidos::all();
        return view('admin.pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        return view('admin.pedidos.create');
    }

    public function store(PedidosRequest $request){

        $pedido = Pedidos::create($request->all());
        
        if($request->file('pdf_1')){
            $pdf = $request->file('pdf_1');
            $nombre = $pdf->getClientOriginalName();
            $url = Storage::putFileAs('pdf', $pdf, $nombre);
            $pedido->pdf()->create([
                'url' => $url
            ]);
        }
        if($request->file('pdf_2')){
            $pdf = $request->file('pdf_2');
            $nombre = $pdf->getClientOriginalName();
            $url = Storage::putFileAs('pdf', $pdf, $nombre);
            $pedido->pdf()->create([
                'url' => $url
            ]);
        }
       
        return redirect()->route('admin.pedidos.index', $pedido)->with('info', 'El pedido se creó con éxito');
     }

    public function edit(Pedidos $pedido){
        $pdfs = Pdf::where('imageable_id' , $pedido->id)->get();
        return view('admin.pedidos.edit', compact('pedido', 'pdfs'));
    }

    public function update(Request $request, Pedidos $pedido){
        
        $request->validate([
            'fecha_creacion' => 'required',
            'referencia' => 'required',
            'n_albaran' => 'required'
        ]);

        $pedido->update($request->all());

        if($request->file('pdf_1')){
            $pdf = $request->file('pdf_1');
            $nombre = $pdf->getClientOriginalName();
            $url = Storage::putFileAs('pdf', $pdf, $nombre);
            $pedido->pdf()->create([
                'url' => $url
            ]);
        }
        if($request->file('pdf_2')){
            $pdf = $request->file('pdf_2');
            $nombre = $pdf->getClientOriginalName();
            $url = Storage::putFileAs('pdf', $pdf, $nombre);
            $pedido->pdf()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.pedidos.edit', $pedido)->with('info', 'El pedido se actualizó con éxito');
    }

    public function destroy(Pedidos $pedido){
        

        //Eliminar archivo de la ruta del pdf del pedido eliminado.
        $urlPdf = Pdf::where('imageable_id' , $pedido->id)->get();
        $url = public_path('storage/' . $urlPdf[0]->url);

        if (file_exists($url)) {
            unlink($url);
        }

        //Elimina la ruta del pdf del pedido eliminado
        $pdf = Pdf::where('imageable_id' , $pedido->id);
        $pdf->delete();
        
        //Elimina el pedido de la bbdd
        $pedido->delete();

        return redirect()->route('admin.pedidos.index', $pedido)->with('info', 'El pedido se eliminó con éxito');
    }

    public function delete(Request $request, Pedidos $pedido){
        
        //Eliminar archivo de la ruta del pdf del pedido eliminado.
        $urlPdf = Pdf::where('id' , $request->id)->get();
        $url = public_path('storage/' . $urlPdf[0]->url);

        if (file_exists($url)) {
            unlink($url);
        }
        //Eliminamos el registo de la bbdd del pdf
        $pdf = Pdf::where('id' , $request->id);
        $pdf->delete();
        return redirect()->route('admin.pedidos.edit',  $request->idPedido)->with('info', 'El documento se eliminó con éxito');

    }
}
