<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTachesTable extends Migration
{
    public function up()
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->unsignedBigInteger('projet_id')->nullable();
            $table->foreign('projet_id', 'projet_fk_8548151')->references('id')->on('projets');
        });
    }
}
