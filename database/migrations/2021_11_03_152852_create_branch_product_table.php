<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchProductTable extends Migration
{
    /**
     * PIVOT TABLE
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('branch_id')->unsigned();// fk with branches
            $table->bigInteger('product_id')->unsigned(); // fk with products
            $table->float('price', 8,2)->default(0.01);
            $table->integer('min_inventory')->default(1);
            $table->integer('max_inventory')->default(1);
            $table->timestamps();

            // constraints
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('branch_product');
        Schema::enableForeignKeyConstraints();
    }
}
