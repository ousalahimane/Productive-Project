<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->longText('description');
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
