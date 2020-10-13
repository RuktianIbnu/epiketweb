<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendataanTamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendataan_tamu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 100);
            $table->string('departement', 100);
            $table->integer('jumlah');
            $table->string('lokasi',50);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('kategori', 100);
            $table->text('lain_lain')->nullable();
            $table->text('deskripsi');
            $table->text('efek');
            $table->text('resiko');
            $table->string('id_petugas',50);
            $table->string('photo_pemberitahuan')->nullable();
            $table->string('type_pemberitahuan')->nullable();
            $table->string('photo_perintah')->nullable();
            $table->string('type_perintah')->nullable();
            $table->string('photo_kegiatan')->nullable();
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
        Schema::dropIfExists('pendataan_tamu');
    }
}
