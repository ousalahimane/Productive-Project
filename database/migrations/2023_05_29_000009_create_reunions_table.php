<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunionsTable extends Migration
{
    public function up()
    {
        Schema::create('reunions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre')->unique();
            $table->date('date');
            $table->time('time');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
