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
        Schema::create('pessoa_endereco', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pessoa');
            $table->unsignedBigInteger('id_endereco');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable(); 

            $table->foreign('id_pessoa')->references('id')->on('pessoas');
            $table->foreign('id_endereco')->references('id')->on('enderecos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoa_endereco');
    }
};
