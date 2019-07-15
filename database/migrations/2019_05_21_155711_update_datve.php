<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDatve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dat_ves', function (Blueprint $table) {
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
        Schema::table('dat_ves', function (Blueprint $table) {
          
            $table->dropColumn('phim_id');
           
        });  
    }
}
