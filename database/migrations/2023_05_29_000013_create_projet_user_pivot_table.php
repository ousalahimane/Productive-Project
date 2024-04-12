<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('projet_user', function (Blueprint $table) {
            $table->unsignedBigInteger('projet_id');
            $table->foreign('projet_id', 'projet_id_fk_8548142')->references('id')->on('projets')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_8548142')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
