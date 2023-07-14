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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('estado_id')->default(1);
            $table->string('nombre');
            $table->text('descripcion');
            $table->text('observaciones')->nullable();
            $table->date('fecha_comprometida')->nullable();
            $table->date('fecha_finalizacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
