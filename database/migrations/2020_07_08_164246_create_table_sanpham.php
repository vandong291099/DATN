<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_sanpham', function (Blueprint $table) {
            $table->Increments('product_id');
            $table->string('product_name');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('product_slug');
            $table->text('product_description');
            $table->text('product_content');
            $table->string('product_price');
            $table->string('product_image');
            $table->integer('product_status');
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
        Schema::dropIfExists('table_sanpham');
    }
}
