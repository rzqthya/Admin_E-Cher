<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('merchant', function (Blueprint $table) {
            $table->id();
            $table->string('nama_merchant');
            $table->string('kategori');
            $table->string('alamat');
            $table->string('no_telp'); //sementara
            $table->string('username_merchant')->nullable()->default(''); //sementara
            $table->string('email_merchant')->nullable()->default(''); //sementara
            $table->string('password_merchant')->nullable()->default(''); //sementara
            $table->unsignedBigInteger('kota_id');
            $table->foreign('kota_id')->references('id')->on('kota');
            // $table->string('level');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::dropIfExists('kota');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        Schema::dropIfExists('merchant');
    }
};