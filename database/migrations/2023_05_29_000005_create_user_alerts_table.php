<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAlertsTable extends Migration
{
    public function up()
    {
        Schema::create('user_alerts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alert_text')->nullable();
            $table->string('alert_link')->nullable();
            $table->date('date');
            $table->time('time');
            $table->longText('proces_verbal');
            $table->timestamps();
        });
    }
}
