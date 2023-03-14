<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFbKontrolKorlapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fb_kontrol_korlap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kontrol_korlap_id');
            $table->text('diagnosis');
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
        Schema::dropIfExists('fb_kontrol_korlap');
    }
}
