<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGioChieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gio_chieus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('gio_chieu')->nullable();
            $table->unsignedInteger('ngay_chieu_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gio_chieus');
    }
}
