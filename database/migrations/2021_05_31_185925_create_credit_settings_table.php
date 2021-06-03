<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_lt')->nullable();
            $table->string('category_en')->nullable();
            $table->string('category_ru')->nullable();
            $table->string('category_slug');
            $table->text('description_lt')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ru')->nullable();
            $table->double('min_sum');
            $table->double('max_sum');
            $table->unsignedSmallInteger('min_term');
            $table->unsignedSmallInteger('max_term');
            $table->double('percent');
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
        Schema::dropIfExists('credit_settings');
    }
}
