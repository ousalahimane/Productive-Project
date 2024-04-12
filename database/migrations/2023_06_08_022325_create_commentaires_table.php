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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->string('contenu');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'fk_user_com')->references('id')->on('users');
            $table->unsignedBigInteger('tache_id')->nullable();
            $table->foreign('tache_id', 'fk_user_tach')->references('id')->on('taches');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentaires');
    }
};
