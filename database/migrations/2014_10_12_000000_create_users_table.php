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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('numTel');
            $table->string('adresseEmail')->unique();
            $table->string('MotDePasse');
            $table->string('photo');
            $table->string('type');
            $table->text('description');
            $table->string('adresse');
            $table->string('equipe')->nullable();
            $table->string('experiences')->nullable();
            $table->string('niveauEtude')->nullable();
            $table->string('competences')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
