<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('Username')->unique();
            $table->string('Email')->unique();
            $table->timestamp('Email_verified_at')->nullable();
            $table->string('password')->notNullable();
            $table->rememberToken();
            $table->unsignedBigInteger('RoleID')->notNullable();
            $table->timestamps();

            $table->foreign('RoleID')->references('RoleID')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
