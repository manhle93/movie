<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongChieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong_chieus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('phong_chieu')->nullable();
            $table->unsignedInteger('gio_chieu_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phong_chieus');
    }
}
