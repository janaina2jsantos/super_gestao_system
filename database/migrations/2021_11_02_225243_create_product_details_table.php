<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned(); // fk with products
            $table->bigInteger('unit_id')->unsigned(); // fk with units
            $table->float('length', 8,2);
            $table->float('width', 8,2);
            $table->float('height', 8,2);
            $table->timestamps();

            // constraint
            $table->foreign('product_id')->references('id')->on('products');
            $table->unique('product_id'); // relation 1:1

            $table->foreign('unit_id')->references('id')->on('units');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('product_details');
        Schema::enableForeignKeyConstraints();
    }
}
