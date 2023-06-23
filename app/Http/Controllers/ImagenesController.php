<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use Illuminate\Http\Request;

class ImagenesController extends Controller
{
    public function create(Request $request){
        if($request->hasFile('imagen')){
            
        }
    }

    public function upload(Request $request , Pedidos $pedido)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('photos'), $filename);
        }
       
    }
}

