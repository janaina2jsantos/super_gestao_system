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
            $table->id();
            $table->bigInteger('unit_id')->unsigned(); // fk with units
            $table->bigInteger('provider_id')->unsigned()->default(1); // fk with providers
            $table->string('name', 150);
            $table->integer('weight')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            // constraints
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');

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
        Schema::dropIfExists('products');
        Schema::enableForeignKeyConstraints();
    }
}
