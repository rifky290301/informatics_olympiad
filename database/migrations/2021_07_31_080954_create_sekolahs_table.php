<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->integer('npsn');
            $table->string('telp_sekolah');
            $table->string('jenis_sekolah')->default('NEGERI');
            $table->string('kelurahan');
            $table->char('district_id', 7);
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->string('jalan');
            $table->string('no_rmh');
            $table->string('rt_rw');
            $table->integer('kodepos');
            $table->integer('kelas');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('sekolahs');
    }
}
