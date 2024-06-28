<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('num_cedula');
            $table->string('direccion');
            $table->bigInteger('numero_telefono');
            $table->string('municipio');
            $table->string('foto_perfil')->nullable(); // Nullable si es opcional
            $table->rememberToken();
            $table->timestamps();
        });

        // Insertar usuario por defecto
        DB::table('users')->insert([
            'name' => 'Dickens :)',
            'email' => 'palmara@gmail.com',
            'password' => Hash::make('12345asd'),
            'num_cedula' => 123456789,
            'direccion' => 'Cl. 17, Mosquera, Cundinamarca, Colombia',
            'numero_telefono' => 1234567890,
            'municipio' => 'Mosquera',
            'foto_perfil' => 'dickens.jpg', // Ruta relativa a public/img
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}