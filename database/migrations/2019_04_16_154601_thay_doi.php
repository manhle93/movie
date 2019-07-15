<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ThayDoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('phong_chieus', function (Blueprint $table) {
            $table->dropColumn('phong_chieu');
            $table->unsignedInteger('phong_chieu_id')->nullable();
        }); 
        Schema::table('ghes', function (Blueprint $table) {
            $table->dropColumn('ten_ghe');
            $table->unsignedInteger('ghe_id')->nullable();
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::table('phong_chieus', function (Blueprint $table) {
            $table->string('phong_chieu')->nullable();
            $table->dropColumn('phong_chieu_id');
        });
    Schema::table('ghes', function (Blueprint $table) { 
            $table->string('ten_ghe')->nullable();
            $table->dropColumn('ghe_id');
        });  
    }
}
