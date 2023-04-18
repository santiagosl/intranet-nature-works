<?php

namespace App\Observers;

use App\Models\Pedidos;
use Illuminate\Support\Facades\Storage;

class PedidosObserver
{
    /**
     * Handle the Pedidos "created" event.
     */
    public function created(Pedidos $pedidos): void
    {
        //
    }

    /**
     * Handle the Pedidos "deleted" event.
     */
    public function deleting(Pedidos $pedidos): void
    {
        if($pedidos->pdf){
            Storage::delete($pedidos->pdf->url);
        }
    }

}
