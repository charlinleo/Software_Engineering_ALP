<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number');
            $table->string('password');
            // $table->bigInteger('role_id')->default(2);
            $table->enum('is_login', ['0', '1'])->default('0');
            $table->enum('is_active', ['0', '1'])->default('0');
            $table->string('remember_token')->nullable();
            $table->timestamps();

            $table->foreignid('role_id')->references('id')->on('roles');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}