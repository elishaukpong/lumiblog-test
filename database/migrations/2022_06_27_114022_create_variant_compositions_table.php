<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantCompositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant_compositions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('url_id')->index();
            $table->string('name');
            $table->timestamps();
            $table->json('composition_ids');
            $table->json('composition_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variant_compositions');
    }
}