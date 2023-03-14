<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPupuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pupuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitra_id');
            $table->foreignId('komoditas_id');
            $table->string('merek_pupuk');
            $table->string('cara aplikasi');
            $table->string('dosis');
            $table->integer('jml_tanam');
            $table->integer('total_bahan');
            $table->date('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pupuk');
    }
}
