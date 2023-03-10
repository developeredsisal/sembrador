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
        Schema::create('lectura', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedInteger('tiempo');
            $table->string('imagen');
            $table->unsignedInteger('grado_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectura');
    }
};
