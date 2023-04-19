<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pedidos;
use Livewire\Component;
use Livewire\WithPagination;

class PedidosIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

        
    public $word = "";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $pedidos = Pedidos::where('status', 'LIKE' ,        '%' . $this->word . '%')
                        ->orWhere('referencia', 'LIKE' ,    '%' . $this->word . '%')
                        ->orWhere('n_albaran', 'LIKE' ,     '%' . $this->word . '%')
                        ->paginate(10);

        return view('livewire.admin.pedidos-index', compact('pedidos'));
    }
}

