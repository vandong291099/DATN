<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableThuonghieu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_thuonghieu', function (Blueprint $table) {
            $table->Increments('brand_id');
            $table->string('brand_name');
            $table->string('brand_slug');
            $table->text('brand_description');
            $table->text('brand_status');
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
        Schema::dropIfExists('table_thuonghieu');
    }
}
