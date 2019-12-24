<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heading')->nullable();
            $table->string('category')->nullable();
            $table->string('producer')->nullable();
            $table->string('name')->nullable();
            $table->string('model')->nullable();
            $table->longtext('description')->nullable();
            $table->string('price')->nullable();
            $table->string('guaranty')->nullable();
            $table->string('availability')->nullable();
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
        Schema::dropIfExists('catalog');
    }
}
