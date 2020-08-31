<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChitietDathang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_chitiet_dathang', function (Blueprint $table) {
            $table->bigIncrements('order_details_id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->float('product_price');
            $table->integer('product_sales_quantity');
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
        Schema::dropIfExists('table_chitiet_dathang');
    }
}
