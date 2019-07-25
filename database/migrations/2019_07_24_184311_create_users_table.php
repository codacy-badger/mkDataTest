<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('type')->comment('0 = Pessoa Jurídica, 1 = Pessoa Física');
            $table->string('cpf')->unique()->nullable();
            $table->string('cnpj')->unique()->nullable();
            $table->string('rg')->nullable();
            $table->string('ie')->nullable();
            $table->bigInteger('group_id');
            $table->boolean('status')->default(true);
            $table->string('phone')->nullable();
            $table->string('password');
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
}
