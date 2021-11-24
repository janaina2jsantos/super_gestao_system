<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_contacts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('contact_reason_id')->unsigned(); // fk with contact_reasons
            $table->string('name', 150);
            $table->string('phone', 150);
            $table->string('email', 150);
            $table->text('message');
            $table->timestamps();

            // constraint
            $table->foreign('contact_reason_id')->references('id')->on('contact_reasons')->onDelete('cascade');
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
        Schema::dropIfExists('site_contacts');
        Schema::enableForeignKeyConstraints();
    }
}
