<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')
                  ->on('sections')->onDelete('cascade');

            $table->string('title');

            $table->string('prop_name');
            $table->string('prop_value');

            $table->json('options')->nullable();

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
        Schema::dropIfExists('section_details');
    }
}
