<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantTable extends Migration
{
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('kota_id');
            $table->string('merchant');
            $table->string('kategori');
            $table->string('alamat');
            $table->timestamp('created_at')->nullable();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('kota_id')->references('id')->on('kotas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('merchants');
    }
}
