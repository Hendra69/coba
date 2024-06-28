<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('employee', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->string('pc');
            $table->string('trxref_id');
            $table->datetime('tgl_trx');
            $table->string('produk');
            $table->string('qty');
            $table->string('no_tujuan');
            $table->string('kode_res')->notNullable();
            $table->string('res');
            $table->string('modul');
            $table->string('status');
            $table->datetime('tgl_status');
            $table->string('nama_supp');
            $table->string('hb_stock');
            $table->string('h_beli');
            $table->string('h_jual');
            $table->string('komisi');
            $table->string('laba');
            $table->string('poin');
            $table->string('reply_provide');
            $table->string('sn');
            $table->string('ref_id');
            $table->string('rate_tp');
            $table->string('rate');
            $table->string('shell');
            $table->string('hb_fix');
            $table->string('notes');
            $table->string('k_provider');
            $table->string('provider');
            $table->string('k_produk');
            // $table->date('doj');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
