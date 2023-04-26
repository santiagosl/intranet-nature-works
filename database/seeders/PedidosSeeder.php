<?php

namespace Database\Seeders;

use App\Models\Pdf;
use App\Models\Imagenes;
use App\Models\Pedidos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pedidos = Pedidos::factory(20)->create();

        foreach($pedidos as $pedido){
            Pdf::factory(1)->create([
                'imageable_id' => $pedido->id,
                'imageable_type' => Pedidos::class
            ]);

            Imagenes::factory(1)->create([
                'imageable_id' => $pedido->id,
                'imageable_type' => Pedidos::class
            ]);
        }
    }
}
