<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimAhlisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tim_ahli', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('pelayanan_id');
            $table->integer('status');
            $table->bigInteger('provinsi');
            $table->bigInteger('kota');
            $table->bigInteger('kecamatan');
            $table->bigInteger('desa');
            $table->string('code')->unique();
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
        Schema::dropIfExists('tim_ahli');
    }
}
