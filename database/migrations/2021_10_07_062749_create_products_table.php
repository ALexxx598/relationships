<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
                $table->bigIncrements('id',true)->index()->unique();
                $table->unsignedBigInteger('product_id')->index()->nullable();
                $table->string('name');
                $table->double('price');
                $table->string('color')->nullable();
                $table->string('size')->nullable();
                $table->double('factory_identity')->nullable();
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
        Schema::dropIfExists('products');
    }
}
