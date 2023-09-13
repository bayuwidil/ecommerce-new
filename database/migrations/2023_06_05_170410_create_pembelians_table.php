<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('penerima');
            $table->string('id_user');
            $table->string('no_pembelian');
            $table->date('tgl_pembelian');
            $table->string('email');
            $table->string('telepon');
            $table->string('alamat');
            $table->string('estimasi');
            $table->string('ekspedisi');
            $table->string('jenis');
            $table->integer('biaya_ongkir');
            $table->integer('jumlah_berat');
            $table->integer('total');
            $table->enum('status',['Unpaid','Paid']);
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
        Schema::dropIfExists('pembelians');
    }
};
