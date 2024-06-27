<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geograficos', function (Blueprint $table) {
            $table->id();
            $table->integer('cod_estado');
            $table->integer('cod_municipio');
            $table->integer('cod_parroquia');
            $table->string('estado');
            $table->string('municipio');
            $table->string('parroquia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geograficos');
    }
};
