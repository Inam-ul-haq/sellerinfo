<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instocks', function (Blueprint $table) {
            $table->id();
            $table->string('url',1000)->nullable();
            $table->string('product',7000)->nullable();
            $table->string('store',7000)->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('instocks');
    }
}
