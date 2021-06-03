<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->string('citizenship')->nullable();
            $table->string('passport_num')->nullable();
            $table->string('passport_issuer')->nullable();
            $table->string('issuer_code')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('user_address')->nullable();
            $table->string('inn')->nullable();
            $table->string('passport_photo_first')->nullable();
            $table->string('passport_photo_address')->nullable();
            $table->string('code_kaz')->nullable();
            $table->string('personal_code')->nullable();
            $table->string('iban')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('user_data');
    }
}
