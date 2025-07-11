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
        Schema::create('muchdans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('mang');
            $table->integer('year');
            $table->date('date');
            $table->integer('salary');
            $table->integer('reward')->default(0)->nullable();
            $table->foreignId('employee_id');
            $table->string('thatuser_get_salary');
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
        Schema::dropIfExists('muchdans');
    }
};