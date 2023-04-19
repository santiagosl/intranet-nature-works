<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->date    ('fecha_creacion');
            $table->string  ('referencia');
            $table->string  ('n_albaran');
            $table->longText('observaciones')->nullable();
            $table->string  ('material_comercial')->nullable();
            $table->string  ('transporte')->nullable();
            $table->date    ('fecha_recogida')->nullable();
            $table->string  ('confirmacion_recogida')->nullable();
            $table->enum  ('status', ["Borrador","Listo","Finalizado"])->default("Borrador");
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
