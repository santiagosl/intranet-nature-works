<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $word;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE' , '%' . $this->word . '%')->paginate();

        /* ->orWhere('email', 'LIKE' , '%' . $this->word . '%') */
        return view('livewire.admin.user-index', compact('users'));
    }
}
