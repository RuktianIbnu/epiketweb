<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendataanDrcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendataan_drc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('petugas_1', 100);
            $table->string('petugas_2', 100);
            $table->string('suhu_ruangan');
            $table->string('ac_backup_1',50);
            $table->string('ac_backup_2',50);
            $table->string('ups_redudancy',50);
            $table->string('ups_load',50);
            $table->string('ups_runtime',50);
            $table->string('ups_temp',50);
            $table->string('ac_1',50);
            $table->string('ac_2',50);
            $table->string('ac_3',50);
            $table->string('keterangan',50);
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
        Schema::dropIfExists('pendataan_drc');
    }
}
