<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherTable extends Migration
{
    public function up()
    {
        Schema::create('voucher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchant_id');
            $table->string('voucher');
            $table->string('deskripsi');
            $table->dateTime('masaBerlaku');
            $table->string('image');
            $table->timestamp('created_at')->nullable();
            $table->foreign('merchant_id')->references('id')->on('merchant');
        });
    }

    public function down()
    {
        Schema::dropIfExists('voucher');
    }
}
