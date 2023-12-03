<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulirTable extends Migration
{
    public function up()
    {
        Schema::create('formulirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voucher_id');
            $table->unsignedBigInteger('wilayah_id');
            $table->unsignedBigInteger('users_id');
            $table->string('nama');
            $table->string('nopol');
            $table->string('image');
            $table->timestamp('created_at')->nullable();
            $table->foreign('voucher_id')->references('id')->on('vouchers');
            $table->foreign('wilayah_id')->references('id')->on('wilayahs');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('formulirs');
    }
}
