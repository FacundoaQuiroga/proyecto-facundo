<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsidiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsidios', function (Blueprint $table) {
            $table->id();
            $table->text('nombres');
            $table->text('apellidos');
            $table->string('user_rut');
            $table->string('email');
            $table->text('tipo_subsidio');
            $table->text('tramo');
            $table->text('fecha_viaje');
            $table->text('estado')->nullable();
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
        Schema::dropIfExists('subsidios');
    }
}
