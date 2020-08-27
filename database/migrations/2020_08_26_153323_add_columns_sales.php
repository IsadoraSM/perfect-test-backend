<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function($table){
            $table->time('hour')->after('date');
            $table->tinyInteger('quantity')->after('hour');
            $table->float('discount')->after('quantity');
            $table->float('final_price')->after('discount')->nullable();
            $table->tinyInteger('status')->after('final_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function($table){
            $table->dropColumn('hour');
            $table->dropColumn('quantity');
            $table->dropColumn('discount');
            $table->dropColumn('final_price');
            $table->dropColumn('status');
        });
    }
}
