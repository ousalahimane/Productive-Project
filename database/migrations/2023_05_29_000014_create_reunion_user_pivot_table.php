<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunionUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('reunion_user', function (Blueprint $table) {
            $table->unsignedBigInteger('reunion_id');
            $table->foreign('reunion_id', 'reunion_id_fk_8548156')->references('id')->on('reunions')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_8548156')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
