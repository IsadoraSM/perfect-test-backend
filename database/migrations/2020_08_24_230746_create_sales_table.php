<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('product_id');
            $table->string('client_name', 80);
            $table->string('client_email', 80);
            $table->string('client_cpf', 14);
            $table->date('date');
            $table->foreign('product_id')
                    ->references('id')
                    ->on('prodcts')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('sales');
    }
}
