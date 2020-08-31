<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMagiamgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_magiamgia', function (Blueprint $table) {
            $table->Increments('coupon_id');
            $table->string('coupon_name');
            $table->string('coupon_code');
            $table->string('coupon_quantity');
            $table->integer('coupon_condition');
            $table->integer('coupon_number');
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
        Schema::dropIfExists('table_magiamgia');
    }
}
