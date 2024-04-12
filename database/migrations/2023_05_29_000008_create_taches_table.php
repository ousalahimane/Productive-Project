<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTachesTable extends Migration
{
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->date('date_echeance');
            $table->string('etat')->default('Nouveau');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
