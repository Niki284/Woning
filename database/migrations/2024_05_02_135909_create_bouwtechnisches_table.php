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
        Schema::create('bouwtechnisches', function (Blueprint $table) {
            $table->id();
            $table->integer('woning_id');
            $table->string('beglazing');
            $table->string('stedenbouwkundige_bestemming');
            $table->string('Dagvaarding_stedenbouwkundige');
            $table->string('Bouwvergunning');
            $table->string('Verkavelingsvergunning');
            $table->string('Recht_van_voorkoop');
            $table->string('As_built_attest');
            $table->string('Beschermd_erfgoed');
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
        Schema::dropIfExists('bouwtechnisches');
    }
};
