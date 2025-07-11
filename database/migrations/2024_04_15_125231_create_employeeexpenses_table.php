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
        Schema::create('employeeexpenses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('employee_id');
            $table->string('subject');
            $table->string('tebene')->nullable();;
            $table->integer('money');
            $table->date('date');
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
        Schema::dropIfExists('employeeexpenses');
    }
};
