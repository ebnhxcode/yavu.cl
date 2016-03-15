<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut', 16);            
            $table->string('email', 200)->unique();
            $table->string('login', 100);              
            $table->string('nombre', 100);
            $table->string('apellido', 100);          
            $table->string('direccion', 100);
            $table->string('ciudad', 100);
            $table->string('region', 100);
            $table->string('pais', 100);
            $table->string('fono', 20);
            $table->string('fono_2', 20);
            $table->string('sexo', 10);
            $table->string('fecha_nacimiento', 100);
            $table->string('password', 100);
            $table->string('estado',30);
            $table->string('referido', 100);
            $table->string('referente', 100);
            $table->string('validacion', 100);
            $table->string('tipo_usuario',20);
            $table->string('imagen_perfil');
            $table->string('imagen_portada');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('users');
    }
}
