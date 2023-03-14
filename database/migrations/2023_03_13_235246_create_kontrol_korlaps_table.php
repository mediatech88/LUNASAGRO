<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontrolKorlapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrol_korlap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pohon_id');
            $table->integer('ph_tanah');
            $table->string('kesuburan');
            $table->string('kondisi_khusus');
            $table->string('foto_video');
            $table->date('tanggal_kontrol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontrol_korlap');
    }
}
