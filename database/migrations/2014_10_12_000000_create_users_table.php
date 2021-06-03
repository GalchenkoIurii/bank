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
            $table->string('login');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedTinyInteger('is_admin')->default(0);
            $table->unsignedTinyInteger('is_banned')->default(0);
            $table->unsignedTinyInteger('need_confirmation')->default(1);
            $table->unsignedTinyInteger('confirmation')->default(0);
            $table->unsignedTinyInteger('confirmed')->default(0);
            $table->timestamp('confirmed_at')->nullable();
            $table->unsignedTinyInteger('show_card')->default(0);
            $table->unsignedTinyInteger('withdrawable')->default(0);
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
