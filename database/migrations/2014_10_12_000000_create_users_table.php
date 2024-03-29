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
            $table->string('lastname');
            $table->string('photo')->default('usuario.png');
            $table->string('slug')->unique();
            $table->string('dni')->nullable();
            $table->bigInteger('country_id')->unsigned()->default(173);
            $table->bigInteger('district_id')->unsigned()->nullable();
            $table->string('phone')->nullable();
            $table->enum('genrer', ["Masculino", "Femenino"])->nullable();
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('state', [1, 2])->default(1);
            $table->enum('type', [1, 2, 3])->default(3);
            $table->rememberToken();
            $table->timestamps();

            #Relations
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
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
