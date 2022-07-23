<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_berkas');
            $table->tinyInteger('status')->default(1);
            $table->integer('size')->default(2048);
            $table->string('type');
            $table->string('format')->nullable();
            $table->string('jenis')->nullable();
            $table->string('petunjuk')->nullable();
            $table->tinyInteger('editable')->default(0);
            $table->tinyInteger('removable')->default(0);
            $table->tinyInteger('mandatory')->default(1);
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
        Schema::dropIfExists('berkas');
    }
}
