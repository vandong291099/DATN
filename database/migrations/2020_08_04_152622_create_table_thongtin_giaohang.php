<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableThongtinGiaohang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_thongtin_giaohang', function (Blueprint $table) {
            $table->Increments('shipping_id');
            $table->string('shipping_name');
            $table->string('shipping_email');
            $table->integer('shipping_phone');
            $table->string('shipping_address');
            $table->string('shipping_note');
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
        Schema::dropIfExists('table_thongtin_giaohang');
    }
}
