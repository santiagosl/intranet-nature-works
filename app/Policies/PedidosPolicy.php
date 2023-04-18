<?php

namespace App\Policies;

use App\Models\Pedidos;
use App\Models\User;

class PedidosPolicy
{
  public function usuario(User $user, Pedidos $pedidos){

    if($user->id == $pe)
    return false;
  }
}
