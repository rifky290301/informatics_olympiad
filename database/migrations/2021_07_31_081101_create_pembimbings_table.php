<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembimbingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembimbings', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('nip')->nullable();
            $table->string('jalan')->nullable();
            $table->string('no_rmh')->nullable();
            $table->string('rt_rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->char('district_id', 7)->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->integer('kodepos')->nullable();
            $table->unsignedBigInteger('profile_id')->nullable();
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
        Schema::dropIfExists('pembimbings');
    }
}
