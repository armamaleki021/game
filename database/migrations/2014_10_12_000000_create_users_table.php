<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('description')->nullable();
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
            $table->date('burn')->nullable();
            $table->integer('status')->default(0);
            $table->string('slug')->nullable();
            $table->string('tel')->nullable();
            $table->integer('is_admin')->default(0);
            $table->string('phone')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('username_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
}
