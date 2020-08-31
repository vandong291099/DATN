<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKhachhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_khachhang', function (Blueprint $table) {
            $table->Increments('customer_id');
            $table->string('customer_name');
            $table->integer('customer_phone');
            $table->string('customer_email');
            $table->string('customer_password');
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
        Schema::dropIfExists('table_khachhang');
    }
}
