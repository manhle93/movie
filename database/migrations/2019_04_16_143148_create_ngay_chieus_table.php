<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNgayChieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngay_chieus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('ngay_chieu')->nullable();
            $table->unsignedInteger('phim_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ngay_chieus');
    }
}
