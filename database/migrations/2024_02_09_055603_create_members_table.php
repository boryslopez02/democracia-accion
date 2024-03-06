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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cedula');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('correo');
            $table->string('fecha_nacimiento');
            $table->string('profesion');
            $table->string('red_social');
            $table->string('usuario_red');
            $table->string('genero');
            $table->string('alcance');
            $table->string('seccional')->nullable();
            $table->string('municipio')->nullable();
            $table->string('parroquia')->nullable();
            $table->string('tipo_cargo');
            $table->string('cargo')->nullable();
            $table->string('buro')->nullable();
            // $table->string('esUsuario');
            // $table->string('password');
            // $table->string('confirm_password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
