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
        Schema::create('answercomplaints', function (Blueprint $table) {
            $table->id();
            $table->longText('answer');
            $table->time('time');
            $table->date('answer_complaint_date');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('complaint_id');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departements');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('complaint_id')->references('id')->on('complaints');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answercomplaints');
    }
};
