<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsSubdirektoratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_subdirektorat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_subdirektorat')->unique();
            $table->string('nama_subdirektorat');
            $table->string('nip_kasubdit');
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
        Schema::dropIfExists('ms_subdirektorat');
    }
}
