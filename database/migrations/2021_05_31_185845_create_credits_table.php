<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('credit_setting_id');
            $table->double('credit_sum');
            $table->unsignedSmallInteger('credit_term');
            $table->double('percent');
            $table->double('monthly_payment');
            $table->unsignedBigInteger('user_id');
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedTinyInteger('reviewing')->default(1);
            $table->unsignedTinyInteger('result')->default(0);
            $table->text('credit_agreement')->nullable();
            $table->text('payments_table')->nullable();
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
        Schema::dropIfExists('credits');
    }
}
