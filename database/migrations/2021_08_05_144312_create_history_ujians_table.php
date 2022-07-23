<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_ujians', function (Blueprint $table) {
            $table->id();
            $table->longText('your_answer');
            $table->boolean('betul_or_tidak');
            $table->boolean('yakin_or_not');
            $table->unsignedBigInteger('ujian_id');
            $table->foreign('ujian_id')->references('id')->on('ujians')->onDelete('cascade');
            $table->unsignedBigInteger('soal_id');
            $table->foreign('soal_id')->references('id')->on('soals')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('history_ujians');
    }
}
