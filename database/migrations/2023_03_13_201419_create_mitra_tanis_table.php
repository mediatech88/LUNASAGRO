<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraTanisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra_tani', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('korlap_id');
            $table->bigInteger('provinsi');
            $table->bigInteger('kota');
            $table->bigInteger('kecamatan');
            $table->bigInteger('desa');
            $table->string('koordinat_lat');
            $table->string('koordinat_long');
            $table->string('elevasi');
            $table->string('luas_lahan');
            $table->string('code')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitra_tani');
    }
}
