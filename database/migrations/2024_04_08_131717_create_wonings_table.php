<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wonings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('woning_type_id')->constrained();
            $table->foreignId('bouwtype_id')->constrained();
            $table->foreignId('makelaar_id')->constrained();
            $table->foreignId('nieuwtype_id')->constrained();
            // $table->foreignId('user_id')->constrained();
            $table->foreignId('nieuwtype_id');
            $table->string('title');
            $table->string('subtitle');
            $table->float('price');
            $table->text('description');
            $table->string('city');
            $table->string('address');
            $table->integer('rooms');
            $table->string('image');
            $table->integer('size');
            $table->string('refnummer');
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
        Schema::dropIfExists('wonings');
    }
};
