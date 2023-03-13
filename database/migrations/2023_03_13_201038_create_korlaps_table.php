<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKorlapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korlap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('admin_id');
            $table->bigInteger('provinsi');
            $table->bigInteger('kota');
            $table->bigInteger('kecamatan');
            $table->bigInteger('desa');
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
        Schema::dropIfExists('korlaps');
    }
}
