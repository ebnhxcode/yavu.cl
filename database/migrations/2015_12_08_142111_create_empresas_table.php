<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateEmpresasTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('empresas');
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id', 20);
            $table->string('rut', 16)->unique();
            $table->string('email', 100)->unique();
            $table->string('login', 100);
            $table->string('nombre', 200);
            $table->string('descripcion', 1000);
            $table->string('direccion', 100);
            $table->string('ciudad', 100);
            $table->string('region', 100);
            $table->string('pais', 100);
            $table->string('fono', 20);
            $table->string('fono_2', 20);
            $table->string('fecha_creacion', 100);
            $table->string('tipo_servicio', 100);
            $table->string('fecha_de_pago', 100);
            $table->string('monto_pagado',100);
            $table->string('nombre_encargado', 100);
            $table->string('imagen_perfil');
            $table->string('imagen_portada');             
            $table->string('password', 100);
            $table->string('estado',30);
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('empresas');
    }
}
